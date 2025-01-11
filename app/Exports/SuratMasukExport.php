<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratMasukExport implements FromCollection, WithHeadings, WithMapping
{
     private $suratData;

     public function __construct($suratData)
     {
          $this->suratData = $suratData; // Save the filtered data
     }

     // Return the filtered collection
     public function collection()
     {
          return $this->suratData; // Use the filtered data passed in the constructor
     }

     // Define column headings for the Excel file
     public function headings(): array
     {
          return [
               'No',
               'Nomor Surat',
               'Dari',
               'Nama Surat',
               'Keterangan',
               'Tanggal Surat',
               'Tanggal Diterima',
               'Kode Klasifikasi',
               'Kurun Waktu',
               'Tingkat Perkembangan',
               'Jumlah',
               'No Filling Cabinet',
               'No Laci',
               'No Folder',
               'Keterangan Biasa',
               'Keterangan Terbatas',
               'Keterangan Rahasia',
               'Keterangan Sangat Rahasia',
               'Jangka Simpan',
               'Tanggal Retensi',
               'Retensi Expired',
               'Disposisi',
               'Link',
          ];
     }

     // Map data for each row in the Excel file
     public function map($surat): array
     {
          static $iteration = 0; // Use static variable for row number

          return [
               ++$iteration, // Increment the counter
               $surat->nomor_surat,
               $surat->dari,
               $surat->nama_surat,
               $surat->keterangan,
               $surat->tanggal_surat,
               $surat->tanggal_diterima,
               $surat->kode_klasifikasi,
               $surat->kurun_waktu,
               $surat->tingkat_perkembangan,
               $surat->jumlah,
               $surat->no_filling_cabinet,
               $surat->no_laci,
               $surat->no_folder,
               $surat->keterangan_biasa,
               $surat->keterangan_terbatas,
               $surat->keterangan_rahasia,
               $surat->keterangan_sangat_rahasia,
               $surat->jangka_simpan,
               $surat->tanggal_retensi, // Format retention date if available
               $surat->retensi_expired ? 'Sudah Habis' : 'Masih Berlaku',
               $surat->disposisi,
               $surat->link,
          ];
     }
}
