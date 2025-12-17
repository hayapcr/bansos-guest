<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\PendaftarBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;

class CreatePendaftarBantuan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');


        $programIDs = ProgramBantuan::pluck('program_id')->toArray();
        $wargaIDs   = Warga::pluck('warga_id')->toArray();

        if (count($programIDs) == 0 || count($wargaIDs) == 0) {
            return;
        }

        for ($i = 1; $i <= 100; $i++) {
            PendaftarBantuan::create([
                'program_id'    => $faker->randomElement($programIDs),
                'warga_id'      => $faker->randomElement($wargaIDs),
                'status_seleksi' => $faker->randomElement([
                    'Lolos', 'Tidak Lolos', 'Menunggu Verifikasi'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
