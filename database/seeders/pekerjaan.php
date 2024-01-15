<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class pekerjaan extends Seeder
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
            DB::table('riwayat_pekerjaan')->insert([
                'id_biodata' => $faker->numberBetween(1,4),
                'posisi' => "Programmer",
                'pendapatan' => $faker->numberBetween(1000000,900000000),
                'tahun' => $faker->year()
            ]);
        }
    }
}
