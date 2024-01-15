<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class pelatihan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('riwayat_pelatihan')->insert([
                'id_biodata' => $faker->numberBetween(1,4),
                'nama_kursus' => "Pelatihan Coding",
                'sertifikat' => $faker->numberBetween(1,2),
                'tahun' => $faker->year()
            ]);
        }
    }
}
