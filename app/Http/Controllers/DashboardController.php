<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSuratMasuk = SuratMasuk::count();
        $totalSuratKeluar = SuratKeluar::count();
        $totalSurat = $totalSuratMasuk + $totalSuratKeluar;

        $suratPerBulan = SuratMasuk::whereMonth('tanggal_surat', now()->month)->count() +
                         SuratKeluar::whereMonth('tanggal_surat', now()->month)->count();

        $suratPerTahun = SuratMasuk::whereYear('tanggal_surat', now()->year)->count() +
                         SuratKeluar::whereYear('tanggal_surat', now()->year)->count();

        $suratExpired = DB::table('surat_masuk')
            ->where('retensi_expired', true)
            ->select('nomor_surat', 'nama_surat', 'tanggal_retensi')
            ->union(
                DB::table('surat_keluar')
                ->where('retensi_expired', true)
                ->select('nomor_surat', 'nama_surat', 'tanggal_retensi')
            )
            ->get();

        $statistikKlasifikasiMasuk = DB::table('surat_masuk')
            ->select('kode_klasifikasi', DB::raw('count(*) as jumlah'))
            ->groupBy('kode_klasifikasi')
            ->pluck('jumlah', 'kode_klasifikasi')
            ->toArray();

        $statistikKlasifikasiKeluar = DB::table('surat_keluar')
            ->select('kode_klasifikasi', DB::raw('count(*) as jumlah'))
            ->groupBy('kode_klasifikasi')
            ->pluck('jumlah', 'kode_klasifikasi')
            ->toArray();

        $klasifikasiLabels = array_keys(array_merge($statistikKlasifikasiMasuk, $statistikKlasifikasiKeluar));
        $klasifikasiMasukData = array_values(array_replace(array_fill_keys($klasifikasiLabels, 0), $statistikKlasifikasiMasuk));
        $klasifikasiKeluarData = array_values(array_replace(array_fill_keys($klasifikasiLabels, 0), $statistikKlasifikasiKeluar));

        return view('dashboard', compact(
            'totalSuratMasuk',
            'totalSuratKeluar',
            'totalSurat',
            'suratPerBulan',
            'suratPerTahun',
            'suratExpired',
            'statistikKlasifikasiMasuk',
            'statistikKlasifikasiKeluar',
            'klasifikasiLabels',
            'klasifikasiMasukData',
            'klasifikasiKeluarData'
        ));
    }
}
