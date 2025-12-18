<?php
namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\PendaftarBantuan;
use App\Models\VerifikasiLapangan;
use Illuminate\Http\Request;

class VerifikasiLapanganController extends Controller
{
    public function index(Request $request)
    {
        $data = VerifikasiLapangan::with(['pendaftar.warga', 'media'])
            ->searchPendaftar($request->search)
            ->filterSkor($request->skor)
            ->orderBy('verifikasi_id', 'desc') // agar terbaru di atas
            ->paginate(12)
            ->withQueryString();

        return view('guest.verifikasi_lapangan.index', compact('data'));
    }

    public function create()
    {
        $pendaftar = PendaftarBantuan::with('warga')->get();
        return view('guest.verifikasi_lapangan.create', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required|string',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable|string',
            'skor'         => 'required|integer|min:0|max:100',

            // ✅ perbaikan validasi multiple file
            'media'        => 'nullable|array',
            'media.*'      => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480',
        ]);

        $verif = VerifikasiLapangan::create($validated);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/verifikasi_lapangan'), $filename);

                Media::create([
                    'ref_table'  => 'verifikasi_lapangan',
                    'ref_id'     => $verif->verifikasi_id,
                    'file_url'   => 'uploads/verifikasi_lapangan/' . $filename,
                    'caption'    => null,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('guest.verifikasi_lapangan.index')
            ->with('success', 'Verifikasi lapangan berhasil ditambahkan!');
    }

    // ========================================
    // SHOW (wajib untuk route resource)
    // ========================================
    public function show($id)
    {
        return $this->detail($id);
    }

    public function detail($id)
    {
        $verif = VerifikasiLapangan::with(['pendaftar.warga', 'media'])
            ->findOrFail($id);

        return view('guest.verifikasi_lapangan.detail', compact('verif'));
    }

    public function edit(string $id)
    {
        $verif     = VerifikasiLapangan::with('media')->findOrFail($id);
        $pendaftar = PendaftarBantuan::with('warga')->get();

        return view('guest.verifikasi_lapangan.edit', compact('verif', 'pendaftar'));
    }

    public function update(Request $request, string $id)
    {
        $verif = VerifikasiLapangan::findOrFail($id);

        $validated = $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required|string',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable|string',
            'skor'         => 'required|integer|min:0|max:100',

            'media'        => 'nullable|array',
            'media.*'      => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480',
        ]);

        $verif->update($validated);

        // Upload media baru
        if ($request->hasFile('media')) {

            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/verifikasi_lapangan'), $filename);

                Media::create([
                    'ref_table'  => 'verifikasi_lapangan',
                    'ref_id'     => $verif->verifikasi_id,
                    'file_url'   => 'uploads/verifikasi_lapangan/' . $filename,
                    'caption'    => null,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()
            ->route('guest.verifikasi_lapangan.index')
            ->with('success', 'Verifikasi lapangan berhasil diperbarui!');
    }

    // =============================
    // UPLOAD MEDIA SAJA (opsional)
    // =============================
    public function uploadMedia(Request $request, $id)
    {
        $verif = VerifikasiLapangan::findOrFail($id);

        $request->validate([
            'media.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        foreach ($request->file('media') as $i => $file) {

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/verifikasi_lapangan'), $filename);

            Media::create([
                'ref_table'  => 'verifikasi_lapangan',
                'ref_id'     => $verif->verifikasi_id,
                'file_url'   => 'uploads/verifikasi_lapangan/' . $filename,
                'caption'    => null,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => $i,
            ]);
        }

        return back()->with('success', 'File berhasil diupload.');
    }

    // =============================
    // HAPUS MEDIA
    // =============================
    public function deleteMedia($media_id)
    {
        $media = Media::findOrFail($media_id);

        $filePath = public_path($media->file_url);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $media->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }

    // =============================
    // DELETE DATA
    // =============================
    public function destroy(string $id)
    {
        $verif = VerifikasiLapangan::with('media')->findOrFail($id);

        // hapus file fisik
        foreach ($verif->media as $m) {
            $filePath = public_path($m->file_url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

        }

        // hapus media dari DB
        Media::where('ref_table', 'verifikasi_lapangan')
            ->where('ref_id', $id)
            ->delete();

        // hapus data utama
        $verif->delete();

        return redirect()
            ->route('guest.verifikasi_lapangan.index')
            ->with('success', 'Verifikasi lapangan berhasil dihapus!');
    }
}
