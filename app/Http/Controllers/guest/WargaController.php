<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    /**
     * Tampilkan daftar warga
     */
    public function index()
    {
        $data = Warga::all();
        return view('guest.warga.index', compact('data'));
    }

    /**
     * Form tambah data warga
     */
    public function create()
    {
        return view('guest.warga.create');
    }

    /**
     * Simpan data warga baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:100',
            'nik'    => 'required|unique:warga,nik',
            'alamat' => 'required',
            'no_hp'  => 'nullable|string|max:20',
        ]);

        Warga::create($validated);

        return redirect()
            ->route('guest.warga.index')
            ->with('success', 'Data warga berhasil ditambahkan!');
    }

    /**
     * Form edit data warga
     */
    public function edit(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('guest.warga.edit', compact('warga'));
    }

    /**
     * Update data warga
     */
    public function update(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'nama'   => 'required|string|max:100',
            'nik'    => 'required|unique:warga,nik,' . $id . ',warga_id',
            'alamat' => 'required',
            'no_hp'  => 'nullable|string|max:20',
        ]);

        $warga->update($validated);

        return redirect()
            ->route('guest.warga.index')
            ->with('success', 'Data warga berhasil diperbarui!');
    }

    /**
     * Hapus data warga
     */
    public function destroy(string $id)
    {
        Warga::destroy($id);

        return redirect()
            ->route('guest.warga.index')
            ->with('success', 'Data warga berhasil dihapus!');
    }
}
