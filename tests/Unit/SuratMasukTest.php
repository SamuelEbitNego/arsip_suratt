<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\SuratMasuk;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SuratMasukTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        
        // Create an admin user and authenticate
        $user = factory(User::class)->create([
            'role' => 'admin'
        ]);
        $this->actingAs($user);
    }

    /** @test */
    public function test_can_create_surat_masuk()
    {
        $data = factory(SuratMasuk::class)->make()->toArray();
        
        $response = $this->post(route('suratmasuk.store'), $data);
        
        $response->assertRedirect(route('suratmasuk.index'));
        $this->assertDatabaseHas('surat_masuk', [
            'nomor_surat' => $data['nomor_surat'],
            'nama_surat' => $data['nama_surat']
        ]);
    }

    /** @test */
    public function test_can_filter_surat_masuk()
    {
        $suratMasuk = factory(SuratMasuk::class)->create();

        $response = $this->get(route('suratmasuk.index', [
            'nama' => $suratMasuk->nama_surat,
            'tanggal' => $suratMasuk->tanggal_surat,
            'kode_klasifikasi' => $suratMasuk->kode_klasifikasi,
            'status_retensi' => 'berlaku'
        ]));

        $response->assertStatus(200);
        $response->assertViewHas('suratMasuk');
    }

    /** @test */
    public function test_can_update_surat_masuk()
    {
        $suratMasuk = factory(SuratMasuk::class)->create();
        $newData = factory(SuratMasuk::class)->make()->toArray();

        $response = $this->put(route('suratmasuk.update', ['id' => $suratMasuk->id]), $newData);

        $response->assertRedirect(route('suratmasuk.index'));
        $this->assertDatabaseHas('surat_masuk', [
            'id' => $suratMasuk->id,
            'nomor_surat' => $newData['nomor_surat'],
            'nama_surat' => $newData['nama_surat']
        ]);
    }

    /** @test */
    public function test_can_delete_surat_masuk()
    {
        $suratMasuk = factory(SuratMasuk::class)->create();

        $response = $this->delete(route('suratmasuk.destroy', ['id' => $suratMasuk->id]));

        $response->assertRedirect(route('suratmasuk.index'));
        $this->assertDatabaseMissing('surat_masuk', ['id' => $suratMasuk->id]);
    }

    /** @test */
    public function test_can_export_pdf()
    {
        factory(SuratMasuk::class, 5)->create();

        $response = $this->get(route('suratmasuk.export_surat_masuk_pdf', ['action' => 'all']));
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    /** @test */
    public function test_can_export_excel()
    {
        factory(SuratMasuk::class, 5)->create();

        $response = $this->get(route('suratmasuk.export_masuk_excel', ['action' => 'all']));
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
