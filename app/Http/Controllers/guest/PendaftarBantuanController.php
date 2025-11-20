<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\PendaftarBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;
use Illuminate\Http\Request;

class PendaftarBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PendaftarBantuan::with(['program','warga'])->paginate(12);
        return view('guest.pendaftar_bantuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = ProgramBantuan::all();
        $warga   = Warga::all();
        return view('guest.pendaftar_bantuan.create', compact('program','warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'status_seleksi' => 'nullable|string',
        ]);

        PendaftarBantuan::create($validated);

        return redirect()
            ->route('guest.pendaftar_bantuan.index')
            ->with('success','Pendaftar bantuan berhasil ditambahkan!');
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
        $pendaftar = PendaftarBantuan::findOrFail($id);
        $program = ProgramBantuan::all();
        $warga = Warga::all();

        return view('guest.pendaftar_bantuan.edit', compact('pendaftar','program','warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftar = PendaftarBantuan::findOrFail($id);

        $validated = $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'status_seleksi' => 'nullable|string',
        ]);

        $pendaftar->update($validated);

        return redirect()
            ->route('guest.pendaftar_bantuan.index')
            ->with('success','Data pendaftar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PendaftarBantuan::destroy($id);

        return redirect()
            ->route('guest.pendaftar_bantuan.index')
            ->with('success','Pendaftar bantuan berhasil dihapus!');
    }
}
