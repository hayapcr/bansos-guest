<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\PenerimaBantuan;
use App\Models\ProgramBantuan;
use App\Models\RiwayatPenyaluranBantuan;
use Illuminate\Http\Request;

class RiwayatPenyaluranBantuanController extends Controller
{
    /**
     * ==============================
     * INDEX (search + filter program)
     * ==============================
     */
    public function index(Request $request)
    {
        $data = RiwayatPenyaluranBantuan::with(['program','penerima.warga','media'])
            ->filter($request)      // filter program
            ->search($request)      // search nama warga
            ->latest('penyaluran_id')
            ->paginate(12)
            ->withQueryString();

        $program = ProgramBantuan::all();

        return view('guest.riwayat.index', compact('data','program'));
    }

    /**
     * ==============================
     * CREATE
     * ==============================
     */
    public function create()
    {
        $program  = ProgramBantuan::all();
        $penerima = PenerimaBantuan::all();

        return view('guest.riwayat.create', compact('program','penerima'));
    }

    /**
     * ==============================
     * STORE
     * ==============================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id'  => 'required|integer',
            'penerima_id' => 'required|integer',
            'tahap_ke'    => 'required|integer',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric',

            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480',
        ]);

        $riwayat = RiwayatPenyaluranBantuan::create($validated);

        // Upload media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/riwayat'), $filename);

                Media::create([
                    'ref_table'  => 'riwayat',
                    'ref_id'     => $riwayat->penyaluran_id,
                    'file_url'   => 'uploads/riwayat/'.$filename,
                    'caption'    => null,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('guest.riwayat_penyaluran.index')
            ->with('success','Riwayat berhasil ditambahkan!');
    }

    /**
     * ==============================
     * EDIT
     * ==============================
     */
    public function edit($id)
    {
        $data = RiwayatPenyaluranBantuan::findOrFail($id);

        $program  = ProgramBantuan::all();
        $penerima = PenerimaBantuan::all();

        return view('guest.riwayat.edit', compact('data','program','penerima'));
    }

    /**
     * ==============================
     * UPDATE
     * ==============================
     */
    public function update(Request $request, $id)
    {
        $riwayat = RiwayatPenyaluranBantuan::findOrFail($id);

        $validated = $request->validate([
            'program_id'  => 'required|integer',
            'penerima_id' => 'required|integer',
            'tahap_ke'    => 'required|integer',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric',

            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480',
        ]);

        $riwayat->update($validated);

        // upload media baru
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/riwayat'), $filename);

                Media::create([
                    'ref_table'  => 'riwayat',
                    'ref_id'     => $riwayat->penyaluran_id,
                    'file_url'   => 'uploads/riwayat/'.$filename,
                    'caption'    => null,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('guest.riwayat_penyaluran.index')
            ->with('success','Riwayat berhasil diperbarui!');
    }

    /**
     * ==============================
     * DETAIL
     * ==============================
     */
    public function show($id)
    {
        $data = RiwayatPenyaluranBantuan::with('media')
            ->findOrFail($id);

        return view('guest.riwayat.detail', compact('data'));
    }

    /**
     * ==============================
     * UPLOAD MEDIA TAMBAHAN
     * ==============================
     */
    public function uploadMedia(Request $request, $id)
    {
        $riwayat = RiwayatPenyaluranBantuan::findOrFail($id);

        $request->validate([
            'media.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        foreach ($request->file('media') as $i => $file) {
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/riwayat'), $filename);

            Media::create([
                'ref_table'  => 'riwayat',
                'ref_id'     => $riwayat->penyaluran_id,
                'file_url'   => 'uploads/riwayat/'.$filename,
                'caption'    => null,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => $i,
            ]);
        }

        return back()->with('success','File berhasil diupload.');
    }

    /**
     * ==============================
     * DELETE MEDIA
     * ==============================
     */
    public function deleteMedia($media_id)
    {
        $media = Media::findOrFail($media_id);

        $path = public_path($media->file_url);
        if (file_exists($path)) {
            unlink($path);
        }

        $media->delete();

        return back()->with('success','File berhasil dihapus.');
    }

    /**
     * ==============================
     * DELETE RIWAYAT (beserta file)
     * ==============================
     */
    public function destroy($id)
    {
        $riwayat = RiwayatPenyaluranBantuan::with('media')
            ->findOrFail($id);

        // hapus file fisik
        foreach ($riwayat->media as $m) {
            $path = public_path($m->file_url);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        Media::where('ref_table','riwayat')
            ->where('ref_id',$id)
            ->delete();

        $riwayat->delete();

        return redirect()->route('guest.riwayat_penyaluran.index')
            ->with('success','Riwayat berhasil dihapus!');
    }
}
