<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class pendidikan extends Seeder
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
            DB::table('pendidikan_terakhir')->insert([
                'id_biodata' => $faker->numberBetween(1,4),
                'jenjang_pendidikan' => "S1",
                'nama_institusi' => $faker->word(),
                'jurusan' => "Teknik Informatika",
                'tahun_lulus' => $faker->year(),
                'ipk' => "3.7"
            ]);
        }
    }
}
