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

        for ($i = 1; $i <= 100; $i++) {   
            $kode = 'B-' . str_pad($i, 3, '0', STR_PAD_LEFT);

            $namaProgram = $faker->randomElement([
                'Bantuan Sembako',
                'Bantuan Pendidikan',
                'Bantuan Kesehatan',
                'Bantuan UMKM',
                'Bantuan Rumah Layak Huni',
                'Bantuan Lansia',
                'Bantuan Peralatan Sekolah'
            ]);

            //  Deskripsi otomatis sesuai nama program
            $deskripsiList = [
                'Bantuan Sembako'           => 'Program bantuan berupa paket sembako untuk membantu kebutuhan pokok masyarakat.',
                'Bantuan Pendidikan'        => 'Program bantuan untuk mendukung biaya pendidikan siswa dari keluarga kurang mampu.',
                'Bantuan Kesehatan'         => 'Program bantuan layanan dan fasilitas kesehatan bagi masyarakat yang membutuhkan.',
                'Bantuan UMKM'              => 'Program dukungan bagi pelaku UMKM berupa modal dan pelatihan usaha.',
                'Bantuan Rumah Layak Huni'  => 'Program bantuan perbaikan atau pembangunan rumah agar layak ditempati.',
                'Bantuan Lansia'            => 'Program bantuan bagi warga lansia dalam bentuk kebutuhan harian dan layanan sosial.',
                'Bantuan Peralatan Sekolah' => 'Program bantuan penyediaan peralatan sekolah untuk mendukung kegiatan belajar siswa.',
            ];

            ProgramBantuan::updateOrCreate(
                ['kode' => $kode],
                [
                    'nama_program' => $namaProgram,

                    'tahun' => $faker->numberBetween(2020, 2025),

                    //  deskripsi sesuai nama program
                    'deskripsi' => $deskripsiList[$namaProgram],

                    'anggaran' => $faker->numberBetween(50000000, 500000000) // 50 juta - 500 juta
                ]
            );
        }
    }
}
