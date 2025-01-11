<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SuratMasuk extends Model
{
     protected $table = 'surat_masuk'; // Sesuaikan nama tabel untuk Surat Masuk

     protected $fillable = [
          'nomor_surat',
          'dari',
          'nama_surat',
          'keterangan',
          'tanggal_surat',
          'tanggal_diterima',
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
          'disposisi',
          'link',
     ];

     protected static function boot()
     {
          parent::boot();

          static::retrieved(function ($surat) {
               $currentDate = Carbon::now();
               if ($surat->tanggal_retensi < $currentDate && !$surat->retensi_expired) {
                    $surat->retensi_expired = true;
                    $surat->save();
               }
          });
     }

     protected $casts = [
          'retensi_expired' => 'boolean',
          'created_at' => 'timestamp',
          'updated_at' => 'timestamp',
     ];

     // Custom accessor to check expiration status
     public function getIsExpiredAttribute()
     {
          return $this->retensi_expired || ($this->tanggal_retensi && $this->tanggal_retensi->isPast());
     }

     // Scope for expired documents
     public function scopeExpired($query)
     {
          return $query->where('retensi_expired', true)
               ->orWhere('tanggal_retensi', '<=', Carbon::now());
     }

     // Scope for non-expired documents
     public function scopeNotExpired($query)
     {
          return $query->where('retensi_expired', false)
               ->where(function ($q) {
                    $q->where('tanggal_retensi', '>', Carbon::now())
                         ->orWhereNull('tanggal_retensi');
               });
     }
}
