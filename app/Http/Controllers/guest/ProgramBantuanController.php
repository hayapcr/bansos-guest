<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\ProgramBantuan;

class ProgramBantuanController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['nama_program'];
        $searchableColumns = ['tahun'];

        $data = ProgramBantuan::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->latest('program_id')
            ->paginate(12)
            ->withQueryString();

        $listProgram = ProgramBantuan::select('nama_program')->distinct()->get();

        return view('guest.program_bantuan.index', compact('data', 'listProgram'));
    }

    public function create()
    {
        return view('guest.program_bantuan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'         => 'required|unique:program_bantuan,kode',
            'nama_program' => 'required|string|max:255',
            'tahun'        => 'required|digits:4',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric|min:0',


            'media.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        $program = ProgramBantuan::create($validated);

        // MEDIA UPLOAD
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/program_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'program_bantuan',
                    'ref_id'    => $program->program_id,
                    'file_url'  => 'uploads/program_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $program = ProgramBantuan::findOrFail($id);
        return view('guest.program_bantuan.edit', compact('program'));
    }

    public function update(Request $request, string $id)
    {
        $program = ProgramBantuan::findOrFail($id);

        $validated = $request->validate([
            'kode'         => 'required|unique:program_bantuan,kode,' . $id . ',program_id',
            'nama_program' => 'required|string|max:255',
            'tahun'        => 'required|digits:4',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric|min:0',

            // 🔥 Validasi file di UPDATE juga
            'media.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        $program->update($validated);

        // MEDIA UPLOAD
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/program_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'program_bantuan',
                    'ref_id'    => $program->program_id,
                    'file_url'  => 'uploads/program_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil diperbarui!');
    }

    public function detail($id)
    {
        $program = ProgramBantuan::with('media')->findOrFail($id);
        return view('guest.program_bantuan.detail', compact('program'));
    }

    public function uploadMedia(Request $request, $id)
    {
        $program = ProgramBantuan::findOrFail($id);

        // 🔥 Validasi file upload tambahan
        $request->validate([
            'media.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20480'
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/program_bantuan'), $filename);

                Media::create([
                    'ref_table' => 'program_bantuan',
                    'ref_id'    => $program->program_id,
                    'file_url'  => 'uploads/program_bantuan/' . $filename,
                    'caption'   => null,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return back()->with('success', 'File berhasil diupload.');
    }

    public function deleteMedia($media_id)
    {
        $media = Media::findOrFail($media_id);

        $filePath = public_path($media->file_url);
        if (file_exists($filePath)) unlink($filePath);

        $media->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }

    public function destroy(string $id)
    {
        $program = ProgramBantuan::findOrFail($id);

        // Hapus file fisik
        foreach ($program->media as $m) {
            $filePath = public_path($m->file_url);
            if (file_exists($filePath)) unlink($filePath);
        }

        // Hapus record media
        Media::where('ref_table', 'program_bantuan')
            ->where('ref_id', $id)
            ->delete();

        $program->delete();

        return redirect()
            ->route('guest.program_bantuan.index')
            ->with('success', 'Program bantuan berhasil dihapus!');
    }
}
