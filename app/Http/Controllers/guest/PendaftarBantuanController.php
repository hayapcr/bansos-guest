<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\PendaftarBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;

class PendaftarBantuanController extends Controller
{
    public function index(Request $request)
    {
        $data = PendaftarBantuan::with(['program','warga'])
            ->search($request)
            ->filter($request, ['status_seleksi'])
            ->orderBy('pendaftar_id', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('guest.pendaftar_bantuan.index', compact('data'));
    }

    public function create()
    {
        $program = ProgramBantuan::all();
        $warga   = Warga::all();
        return view('guest.pendaftar_bantuan.create', compact('program','warga'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'status_seleksi' => 'nullable|string',
            'media.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        $pendaftar = PendaftarBantuan::create($validated);

        // Upload media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftar_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'pendaftar_bantuan',
                    'ref_id'    => $pendaftar->pendaftar_id,
                    'file_url'  => 'uploads/pendaftar_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return redirect()->route('guest.pendaftar_bantuan.index')
            ->with('success','Pendaftar bantuan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $pendaftar = PendaftarBantuan::findOrFail($id);
        $program = ProgramBantuan::all();
        $warga = Warga::all();

        return view('guest.pendaftar_bantuan.edit', compact('pendaftar','program','warga'));
    }

    public function update(Request $request, string $id)
    {
        $pendaftar = PendaftarBantuan::findOrFail($id);

        $validated = $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'status_seleksi' => 'nullable|string',
            'media.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        $pendaftar->update($validated);

        // Upload media baru
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftar_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'pendaftar_bantuan',
                    'ref_id'    => $pendaftar->pendaftar_id,
                    'file_url'  => 'uploads/pendaftar_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return redirect()->route('guest.pendaftar_bantuan.index')
            ->with('success','Data pendaftar berhasil diperbarui!');
    }

    // =============================
    // SHOW (wajib ada untuk resource)
    // =============================
    public function show($id)
    {
        return $this->detail($id); // arahkan ke detail
    }

    // =============================
    // DETAIL
    // =============================
    public function detail($id)
    {
        $pendaftar = PendaftarBantuan::with(['program','warga','media'])
            ->findOrFail($id);

        return view('guest.pendaftar_bantuan.detail', compact('pendaftar'));
    }

    // Upload Media
    public function uploadMedia(Request $request, $id)
    {
        $pendaftar = PendaftarBantuan::findOrFail($id);

        $request->validate([
            'media.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftar_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'pendaftar_bantuan',
                    'ref_id'    => $pendaftar->pendaftar_id,
                    'file_url'  => 'uploads/pendaftar_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return back()->with('success','File berhasil diupload.');
    }

    // Delete Media
    public function deleteMedia($media_id)
    {
        $media = Media::findOrFail($media_id);

        $filePath = public_path($media->file_url);
        if (file_exists($filePath)) unlink($filePath);

        $media->delete();

        return back()->with('success','File berhasil dihapus.');
    }

    public function destroy(string $id)
    {
        $pendaftar = PendaftarBantuan::findOrFail($id);

        // Hapus file media
        foreach ($pendaftar->media as $m) {
            $filePath = public_path($m->file_url);
            if (file_exists($filePath)) unlink($filePath);
        }

        // Hapus media dari DB
        Media::where('ref_table','pendaftar_bantuan')
            ->where('ref_id',$id)
            ->delete();

        // Hapus data utama
        $pendaftar->delete();

        return redirect()->route('guest.pendaftar_bantuan.index')
            ->with('success','Pendaftar bantuan berhasil dihapus!');
    }
}
