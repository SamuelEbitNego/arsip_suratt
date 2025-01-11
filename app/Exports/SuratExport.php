<?php

namespace App\Exports;

use App\Models\Surat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratExport implements FromCollection, WithHeadings
{
    protected $bulan, $tahun;

    public function __construct($bulan = null, $tahun = null)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $query = Surat::query();

        if ($this->bulan) {
            $query->whereMonth('tanggal_surat', $this->bulan);
        }

        if ($this->tahun) {
            $query->whereYear('tanggal_surat', $this->tahun);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama Surat', 'Tanggal Surat', 'Kode Klasifikasi', 'Tanggal Retensi', 'Keterangan',
        ];
    }
}
