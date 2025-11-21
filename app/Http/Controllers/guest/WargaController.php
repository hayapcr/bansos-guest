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
    public function index(Request $request)
    {
        $filterableColumns = ['jenis_kelamin'];
        $data = Warga::filter($request, $filterableColumns)
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama', 'like', '%'.$request->search.'%')
                  ->orWhere('no_ktp', 'like', '%'.$request->search.'%');
            })
            ->paginate(10)
            ->withQueryString();
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
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama'         => 'required|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
        ]);

        Warga::create($validated);

        return redirect()->route('guest.warga.index')
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
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama'         => 'required|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
        ]);

        $warga->update($validated);

        return redirect()->route('guest.warga.index')
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
