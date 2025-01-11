<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Surat extends Model
{
     protected $table = 'surats-keluar';

     protected $fillable = [
          'nomor_surat',
          'nama_surat',
          'tanggal_surat',
          'kode_klasifikasi',
          'kurun_waktu',
          'tingkat_perkembangan',
          'jumlah',
          'no_filling_cabinet',
          'no_laci',
          'no_folder',
          'keterangan_biasa',
          'keterangan_terbatas',
          'keterangan_rahasia',
          'keterangan_sangat_rahasia',
          'jangka_simpan',
          'tanggal_retensi',
          'retensi_expired',
          'link',
     ];

     protected $dates = [
          'tanggal_surat',
          'tanggal_retensi',
          'created_at',
          'updated_at',
     ];

     protected $casts = [
          'retensi_expired' => 'boolean', // Retention status flag
     ];

     // Custom accessor for checking expiration status based on the retention date
     public function getIsExpiredAttribute()
     {
          return $this->retensi_expired || ($this->tanggal_retensi && $this->tanggal_retensi->isPast());
     }

     // Scope for documents that are expired based on the retention date
     public function scopeExpired($query)
     {
          return $query->where('retensi_expired', true)
               ->orWhere('tanggal_retensi', '<=', Carbon::now());
     }

     // Scope for documents that are not expired
     public function scopeNotExpired($query)
     {
          return $query->where('retensi_expired', false)
               ->where(function ($q) {
                    $q->where('tanggal_retensi', '>', Carbon::now())
                         ->orWhereNull('tanggal_retensi');
               });
     }
}
