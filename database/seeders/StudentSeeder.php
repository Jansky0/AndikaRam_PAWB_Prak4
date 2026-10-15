<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('mahasiswa')->insert([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'jurusan' => $faker->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Komputer']),
                'umur' => $faker->numberBetween(18, 25),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
