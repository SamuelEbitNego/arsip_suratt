<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SuratKeluar;
use Faker\Generator as Faker;

$factory->define(SuratKeluar::class, function (Faker $faker) {
    return [
        'nomor_surat' => 'SK/' . $faker->year . '/' . $faker->unique()->numberBetween(001, 999),
        'nama_surat' => $faker->sentence,
        'tanggal_surat' => $faker->date(),
        'kode_klasifikasi' => 'KL' . $faker->numberBetween(001, 999),
        'kurun_waktu' => $faker->year,
        'tingkat_perkembangan' => $faker->randomElement(['Asli', 'Salinan', 'Tembusan']),
        'jumlah' => $faker->numberBetween(1, 5),
        'no_filling_cabinet' => 'FC-' . $faker->numberBetween(01, 99),
        'no_laci' => 'L-' . $faker->numberBetween(01, 99),
        'no_folder' => 'F-' . $faker->numberBetween(01, 99),
        'keterangan_biasa' => $faker->randomElement(['Ya', 'Tidak']),
        'keterangan_terbatas' => $faker->randomElement(['Ya', 'Tidak']),
        'keterangan_rahasia' => $faker->randomElement(['Ya', 'Tidak']),
        'keterangan_sangat_rahasia' => $faker->randomElement(['Ya', 'Tidak']),
        'jangka_simpan' => $faker->randomElement(['1 tahun', '5 tahun', '10 tahun']),
        'tanggal_retensi' => $faker->date(),
        'retensi_expired' => $faker->boolean,
        'link' => $faker->url
    ];
});
