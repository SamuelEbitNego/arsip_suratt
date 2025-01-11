<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\SuratKeluar;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SuratKeluarTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->user = factory(User::class)->create(['role' => 'admin']);
        $this->actingAs($this->user);
    }

    /** @test */
    public function can_create_surat_keluar()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 100);

        $suratData = [
            'nomor_surat' => 'SK/2025/001',
            'nama_surat' => 'Surat Pemberitahuan',
            'tanggal_surat' => '2025-01-02',
            'kode_klasifikasi' => 'KL001',
            'kurun_waktu' => '2025',
            'tingkat_perkembangan' => 'Asli',
            'jumlah' => 1,
            'no_filling_cabinet' => 'FC-01',
            'no_laci' => 'L-01',
            'no_folder' => 'F-01',
            'keterangan_biasa' => 'Ya',
            'keterangan_terbatas' => 'Tidak',
            'keterangan_rahasia' => 'Tidak',
            'keterangan_sangat_rahasia' => 'Tidak',
            'jangka_simpan' => '5 tahun',
            'tanggal_retensi' => '2030-01-02',
            'retensi_expired' => false,
            'link' => 'https://example.com/document.pdf'
        ];

        $response = $this->post('/suratkeluar', $suratData);
        $response->assertStatus(302);
        $response->assertRedirect(route('suratkeluar.index'));

        $this->assertDatabaseHas('surat_keluar', [
            'nomor_surat' => 'SK/2025/001',
            'nama_surat' => 'Surat Pemberitahuan',
            'kode_klasifikasi' => 'KL001'
        ]);
    }

    /** @test */
    public function can_filter_surat_keluar()
    {
        $surat = factory(SuratKeluar::class)->create([
            'nama_surat' => 'Surat Test',
            'tanggal_surat' => '2025-01-02',
            'kode_klasifikasi' => 'KL001'
        ]);

        $response = $this->get('/suratkeluar?nama=Test&tanggal=2025-01-02&kode_klasifikasi=KL001');
        $response->assertStatus(200);
        $response->assertViewHas('suratKeluar');
    }

    /** @test */
    public function can_update_surat_keluar()
    {
        $surat = factory(SuratKeluar::class)->create();
        
        $updateData = [
            'nama_surat' => 'Updated Surat',
            'kode_klasifikasi' => 'KL002',
            'keterangan_biasa' => 'Ya',
            'keterangan_terbatas' => 'Tidak',
            'keterangan_rahasia' => 'Tidak',
            'keterangan_sangat_rahasia' => 'Tidak',
            'link' => 'https://example.com/updated.pdf'
        ];

        $response = $this->put('/suratkeluar/' . $surat->id, $updateData);
        $response->assertStatus(302);
        $response->assertRedirect(route('suratkeluar.index'));

        $this->assertDatabaseHas('surat_keluar', [
            'id' => $surat->id,
            'nama_surat' => 'Updated Surat',
            'kode_klasifikasi' => 'KL002'
        ]);
    }

    /** @test */
    public function can_delete_surat_keluar()
    {
        $surat = factory(SuratKeluar::class)->create();
        
        $response = $this->delete('/suratkeluar/' . $surat->id);
        $response->assertStatus(302);
        $response->assertRedirect(route('suratkeluar.index'));

        $this->assertDatabaseMissing('surat_keluar', [
            'id' => $surat->id
        ]);
    }

    /** @test */
    public function can_export_pdf()
    {
        factory(SuratKeluar::class, 5)->create();

        $response = $this->get('/suratkeluar/export-pdf/all');
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    /** @test */
    public function can_export_excel()
    {
        factory(SuratKeluar::class, 5)->create();

        $response = $this->get(route('suratkeluar.export_keluar_excel', ['action' => 'all']));
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
