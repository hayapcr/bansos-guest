<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPenyaluranBantuan;
use App\Models\PenerimaBantuan;
use App\Models\ProgramBantuan;
use Faker\Factory as Faker;

class CreateRiwayatPenyaluranBantuan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan FK check
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RiwayatPenyaluranBantuan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');

        // Ambil ID yang valid
        $programIds  = ProgramBantuan::pluck('program_id')->toArray();
        $penerimaIds = PenerimaBantuan::pluck('penerima_id')->toArray();

        if (empty($programIds) || empty($penerimaIds)) {
            $this->command->warn("⚠️ Harap isi tabel program_bantuan & penerima_bantuan terlebih dahulu.");
            return;
    }

    // Buat 100 data riwayat
        for ($i = 1; $i <= 100; $i++) {
            RiwayatPenyaluranBantuan::create([
                'program_id'       => $faker->randomElement($programIds),
                'penerima_id'      => $faker->randomElement($penerimaIds),
                'tahap_ke'         => $faker->numberBetween(1, 4),
                'tanggal'          => $faker->dateTimeBetween('-2 years', 'now'),
                'nilai'            => $faker->numberBetween(250000, 3000000),
                'bukti_penyaluran' => null, 
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
