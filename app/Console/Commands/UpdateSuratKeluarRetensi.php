<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SuratKeluar;
use Carbon\Carbon;

class UpdateSuratKeluarRetensi extends Command
{
    protected $signature = 'suratkeluar:update-retensi';
    protected $description = 'Update retensi expired status for Surat Keluar';

    public function handle()
    {
        $currentDate = Carbon::now();

        // Update records where tanggal_retensi has passed
        SuratKeluar::where('tanggal_retensi', '<', $currentDate)
            ->where('retensi_expired', false)
            ->update(['retensi_expired' => true]);

        $this->info('Retensi status updated successfully.');
    }
}
