<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramBantuan;

class ProgramBantuanController extends Controller
{
    /**
     * Tampilkan daftar program bantuan
     */
    public function index()
    {
        $data = ProgramBantuan::all();
        return view('guest.program_bantuan.index', compact('data'));
    }

    /**
     * Form tambah program bantuan
     */
    public function create()
    {
        return view('guest.program_bantuan.create');
    }

    /**
     * Simpan program bantuan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'         => 'required|unique:program_bantuan,kode',
            'nama_program' => 'required|string|max:255',
            'tahun'        => 'required|digits:4',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric|min:0',
        ]);

        ProgramBantuan::create($validated);

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil ditambahkan!');
    }

    /**
     * Form edit program bantuan
     */
    public function edit(string $id)
    {
        $program = ProgramBantuan::findOrFail($id);
        return view('guest.program_bantuan.edit', compact('program'));
    }

    /**
     * Update data program bantuan
     */
    public function update(Request $request, string $id)
    {
        $program = ProgramBantuan::findOrFail($id);

        $validated = $request->validate([
            'kode'         => 'required|unique:program_bantuan,kode,' . $id . ',program_id',
            'nama_program' => 'required|string|max:255',
            'tahun'        => 'required|digits:4',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric|min:0',
        ]);

        $program->update($validated);

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil diperbarui!');
    }

    /**
     * Hapus program bantuan
     */
    public function destroy(string $id)
    {
        ProgramBantuan::destroy($id);

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil dihapus!');
    }
}
