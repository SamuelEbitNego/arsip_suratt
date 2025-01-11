<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('nama_surat');
            $table->string('kode_klasifikasi');
            $table->date('tanggal_surat');
            $table->string('kurun_waktu')->nullable();
            $table->string('tingkat_perkembangan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('no_filling_cabinet')->nullable();
            $table->string('no_laci')->nullable();
            $table->string('no_folder')->nullable();
            $table->text('keterangan_biasa')->nullable();
            $table->text('keterangan_terbatas')->nullable();
            $table->text('keterangan_rahasia')->nullable();
            $table->text('keterangan_sangat_rahasia')->nullable();
            $table->string('jangka_simpan')->nullable();
            $table->date('tanggal_retensi')->nullable();
            $table->boolean('retensi_expired')->default(false);
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
