<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramBantuan;

class CreateProgramBantuan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramBantuan::updateOrCreate(
            ['kode' => 'B-001'], // unique key
            [
                'nama_program' => 'Bantuan Sembako',
                'tahun' => 2024,
                'deskripsi' => 'Program bantuan sembako untuk keluarga kurang mampu.',
                'anggaran' => 150000000.00
            ]
        );

        ProgramBantuan::updateOrCreate(
            ['kode' => 'B-002'], // unique key
            [
                'nama_program' => 'Bantuan Pendidikan',
                'tahun' => 2024,
                'deskripsi' => 'Bantuan biaya pendidikan untuk siswa kurang mampu.',
                'anggaran' => 200000000.00
            ]
        );
    }
}
