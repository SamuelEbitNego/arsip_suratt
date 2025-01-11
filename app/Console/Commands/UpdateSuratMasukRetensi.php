<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SuratMasuk;
use Carbon\Carbon;

class UpdateSuratMasukRetensi extends Command
{
    protected $signature = 'suratkeluar:update-retensi';
    protected $description = 'Update retensi expired status for Surat Keluar';

    public function handle()
    {
        $currentDate = Carbon::now();

        // Update records where tanggal_retensi has passed
        SuratMasuk::where('tanggal_retensi', '<', $currentDate)
            ->where('retensi_expired', false)
            ->update(['retensi_expired' => true]);

        $this->info('Retensi status updated successfully.');
    }
}
