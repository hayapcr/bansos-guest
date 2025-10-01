<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Menampilkan daftar program bantuan sosial.
     */
    public function index()
    {
        $programs = [
            [
                'program_id' => 1,
                'kode' => 'PB2025-001',
                'nama_program' => 'Bantuan Sembako Desa',
                'tahun' => 2025,
                'anggaran' => 50000000,
                'deskripsi' => 'Bantuan sembako bagi keluarga kurang mampu.'
            ],
            [
                'program_id' => 2,
                'kode' => 'PB2025-002',
                'nama_program' => 'Modal Usaha Mikro',
                'tahun' => 2025,
                'anggaran' => 75000000,
                'deskripsi' => 'Bantuan modal untuk UMKM mikro di desa.'
            ],
            [
                'program_id' => 3,
                'kode' => 'PB2025-003',
                'nama_program' => 'Beasiswa Pendidikan',
                'tahun' => 2025,
                'anggaran' => 30000000,
                'deskripsi' => 'Beasiswa untuk siswa/mahasiswa berprestasi dari keluarga miskin.'
            ],
        ];
        return view('index', compact('programs'));
    }
}
