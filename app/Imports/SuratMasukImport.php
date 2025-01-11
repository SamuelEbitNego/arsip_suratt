<?php

namespace App\Imports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SuratMasukImport implements ToModel, WithHeadingRow
{
     /**
      * Map each row in the spreadsheet to a model.
      *
      * @param array $row
      * @return \Illuminate\Database\Eloquent\Model|null
      */
     public function model(array $row)
     {
          // Determine the value of 'retensi_expired' as a boolean
          $retensiExpired = strtolower($row['retensi_expired']) === 'sudah habis' ? true : false;
          $disposisi = $row['disposisi'] ?? 'Default Category';

          return new SuratMasuk([
               'nomor_surat' => $row['nomor_surat'],
               'dari' => $row['dari'],
               'nama_surat' => $row['nama_surat'],
               'keterangan' => $row['keterangan'],
               'kode_klasifikasi' => $row['kode_klasifikasi'],
               'kurun_waktu' => $row['kurun_waktu'],
               'tingkat_perkembangan' => $row['tingkat_perkembangan'],
               'jumlah' => $row['jumlah'],
               'no_filling_cabinet' => $row['no_filling_cabinet'],
               'no_laci' => $row['no_laci'],
               'no_folder' => $row['no_folder'],
               'keterangan_biasa' => $row['keterangan_biasa'],
               'keterangan_terbatas' => $row['keterangan_terbatas'],
               'keterangan_rahasia' => $row['keterangan_rahasia'],
               'keterangan_sangat_rahasia' => $row['keterangan_sangat_rahasia'],
               'jangka_simpan' => $row['jangka_simpan'],
               'tanggal_surat' => Carbon::parse($row['tanggal_surat']),
               'tanggal_diterima' => Carbon::parse($row['tanggal_diterima']),
               'tanggal_retensi' => Carbon::parse($row['tanggal_retensi']),
               'retensi_expired' => $retensiExpired,  // Set as true or false
               'disposisi' => $disposisi,
               'link' => $row['link'] ?? null,
          ]);
     }
}
