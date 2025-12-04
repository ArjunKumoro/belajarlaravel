<?php

namespace Database\Seeders; // HARUS namespace ini di Laravel 12+

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            DB::table('pegawai')->insert([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'pekerjaan' => 'karyawan',
            ]);
        }
    }
}
