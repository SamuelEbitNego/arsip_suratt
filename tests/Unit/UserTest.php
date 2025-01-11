<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->superadmin = factory(User::class)->create([
            'role' => 'superadmin',
            'email' => 'superadmin@example.com'
        ]);
        $this->actingAs($this->superadmin);
    }

    /** @test */
    public function can_create_user()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'user'
        ];

        $response = $this->post(route('superadmin.users.store'), $userData);
        
        $response->assertRedirect(route('superadmin.users.index'));
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user'
        ]);
    }

    /** @test */
    public function can_view_user()
    {
        $user = factory(User::class)->create();
        
        $response = $this->get(route('superadmin.users.edit', $user->id));
        $response->assertStatus(200);
        $response->assertSee($user->name);
    }

    /** @test */
    public function can_update_user()
    {
        $user = factory(User::class)->create();
        
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role' => 'user'
        ];

        $response = $this->put(route('superadmin.users.update', $user->id), $updateData);
        
        $response->assertRedirect(route('superadmin.users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com'
        ]);
    }

    /** @test */
    public function can_delete_user()
    {
        $user = factory(User::class)->create();

        $response = $this->delete(route('superadmin.users.destroy', $user->id));
        
        $response->assertRedirect(route('superadmin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    /** @test */
    public function cannot_create_user_with_duplicate_email()
    {
        $existingUser = factory(User::class)->create([
            'email' => 'test@example.com'
        ]);

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'user'
        ];

        $response = $this->post(route('superadmin.users.store'), $userData);
        
        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('users', 2); // Only superadmin and existing user
    }

    /** @test */
    public function can_change_user_password()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('oldpassword')
        ]);

        $updateData = [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword'
        ];

        $response = $this->put(route('superadmin.users.update', $user->id), $updateData);
        
        $response->assertRedirect(route('superadmin.users.index'));
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }
}
