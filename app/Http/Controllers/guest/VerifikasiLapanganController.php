<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\VerifikasiLapangan;
use App\Models\PendaftarBantuan;
use Illuminate\Http\Request;

class VerifikasiLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VerifikasiLapangan::with('pendaftar')->paginate(12);
        return view('guest.verifikasi_lapangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftar = PendaftarBantuan::all();
        return view('guest.verifikasi_lapangan.create', compact('pendaftar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required|string',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable|string',
            'skor'         => 'required|integer|min:0|max:100',
        ]);

        VerifikasiLapangan::create($validated);

        return redirect()
            ->route('guest.verifikasi_lapangan.index')
            ->with('success','Verifikasi lapangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $verif = VerifikasiLapangan::findOrFail($id);
        $pendaftar = PendaftarBantuan::all();

        return view('guest.verifikasi_lapangan.edit', compact('verif','pendaftar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $verif = VerifikasiLapangan::findOrFail($id);

        $validated = $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required|string',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable|string',
            'skor'         => 'required|integer|min:0|max:100',
        ]);

        $verif->update($validated);

        return redirect()
            ->route('guest.verifikasi_lapangan.index')
            ->with('success','Verifikasi lapangan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VerifikasiLapangan::destroy($id);

        return redirect()
            ->route('guest.verifikasi_lapangan.index')
            ->with('success','Verifikasi lapangan berhasil dihapus!');
    }
}
