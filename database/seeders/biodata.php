<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class biodata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 4) as $index) {
            DB::table('biodata')->insert([
                'id_user' => $faker->numberBetween(1,10),
                'posisi' => "programmer",
                'nama' => $faker->name(),
                'no_ktp' => $faker->numberBetween(100000000,999999999),
                'ttl'=> "Jakarta, 20 - juli - 1998",
                'jenkel' => "L",
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya']),
                'gol_darah' => $faker->randomElement(['A', 'B', 'A+', 'B+', 'O', 'Lainnya']),
                'status' => $faker->randomElement(['Kawin', 'Belum Kawin', 'Cerai','Lainnya']),
                'alamat_ktp' => $faker->address(),
                'alamat_tinggal' => $faker->address(),
                'no_telp' => $faker->numberBetween(100000000,999999999),
                'orang_terdekat' => $faker->name(),
                'skill' => $faker->randomElement(['Problem Solving', 'PHP', 'Laravel','Lainnya']),
                'penempatan' => $faker->numberBetween(1,2),
                'gaji' => $faker->numberBetween(1000000,900000000)
            ]);
        }
    }
}
