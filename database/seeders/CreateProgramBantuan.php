<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ProgramBantuan;

class CreateProgramBantuan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {   // 🔥 ubah 5 menjadi 15
            $kode = 'B-' . str_pad($i, 3, '0', STR_PAD_LEFT);

            ProgramBantuan::updateOrCreate(
                ['kode' => $kode],
                [
                    'nama_program' => $faker->randomElement([
                        'Bantuan Sembako',
                        'Bantuan Pendidikan',
                        'Bantuan Kesehatan',
                        'Bantuan UMKM',
                        'Bantuan Rumah Layak Huni',
                        'Bantuan Lansia',
                        'Bantuan Peralatan Sekolah'
                    ]),

                    'tahun' => $faker->numberBetween(2022, 2025),

                    'deskripsi' => $faker->sentence(10),

                    'anggaran' => $faker->numberBetween(50000000, 500000000) // 50 juta - 500 juta
                ]
            );
        }
    }
}
