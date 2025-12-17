<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\PenerimaBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = PenerimaBantuan::with(['warga','program'])
            ->searchWarga($request->search)
            ->filterProgram($request->program_id)
            ->latest('penerima_id')
            ->orderBy('penerima_id','desc')
            ->paginate(12)
            ->withQueryString();

        return view('guest.penerima_bantuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = ProgramBantuan::all();
        $warga = Warga::all();
        return view('guest.penerima_bantuan.create', compact('programs','warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|integer|exists:program_bantuan,program_id',
            'warga_id'   => 'required|integer|exists:warga,warga_id',
            'keterangan' => 'nullable|string',
        ]);

        PenerimaBantuan::create($validated);

        return redirect()
            ->route('guest.penerima_bantuan.index')
            ->with('success','Penerima bantuan berhasil ditambahkan!');
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
    public function edit($id)
    {
        $item = PenerimaBantuan::findOrFail($id);
        $programs = ProgramBantuan::all();
        $warga = Warga::all();

        return view('guest.penerima_bantuan.edit', compact('item','programs','warga'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = PenerimaBantuan::findOrFail($id);

        $validated = $request->validate([
            'program_id' => 'required|integer|exists:program_bantuan,program_id',
            'warga_id'   => 'required|integer|exists:warga,warga_id',
            'keterangan' => 'nullable|string',
        ]);

        $item->update($validated);

        return redirect()
            ->route('guest.penerima_bantuan.index')
            ->with('success','Data penerima bantuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PenerimaBantuan::destroy($id);

        return redirect()
            ->route('guest.penerima_bantuan.index')
            ->with('success','Data penerima bantuan berhasil dihapus!');
    }
}
