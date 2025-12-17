<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PenerimaBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;
use Faker\Factory as Faker;

class CreatePenerimaBantuan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PenerimaBantuan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');

        $keteranganList = [
            "Layak menerima bantuan berdasarkan hasil survey lapangan.",
            "Termasuk kategori miskin dan memiliki banyak tanggungan.",
            "Belum pernah menerima bantuan sosial sebelumnya.",
            "Diprioritaskan karena kondisi rumah tidak layak huni.",
            "Penerima bekerja sebagai buruh harian dengan penghasilan rendah.",
            "Akses air bersih kurang memadai dan sanitasi buruk.",
            "Memiliki anggota keluarga dengan penyakit menahun.",
            "Masuk kategori prioritas berdasarkan musyawarah desa.",
            "Tinggal di kontrakan kecil dengan kondisi ekonomi tidak stabil.",
            "Pengeluaran bulanan keluarga lebih besar dari pendapatan.",
        ];

        $programIds = ProgramBantuan::pluck('program_id')->toArray();
        $wargaIds   = Warga::pluck('warga_id')->toArray();

        if (empty($programIds) || empty($wargaIds)) {
            $this->command->warn("⚠️ Harap isi tabel program_bantuan & warga terlebih dahulu.");
            return;
        }

        // Generate 100 penerima bantuan
        for ($i = 1; $i <= 100; $i++) {
            PenerimaBantuan::create([
                'program_id' => $faker->randomElement($programIds),
                'warga_id'   => $faker->randomElement($wargaIds),
                'keterangan' => $faker->randomElement($keteranganList),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
