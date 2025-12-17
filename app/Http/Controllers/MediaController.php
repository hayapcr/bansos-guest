<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = MediaBansos::orderBy('media_id', 'desc')->get();
        return view('media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ref_table' => 'required|string',
            'ref_id'    => 'required|integer',
            'files.*'   => 'required|file|max:5120',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                if (!$file->isValid()) continue;

                $filename = round(microtime(true) * 1000) . '-' .
                    str_replace(' ', '-', $file->getClientOriginalName());

                $file->move(public_path('uploads/mediabansos'), $filename);

                MediaBansos::create([
                    'ref_table' => $request->ref_table,
                    'ref_id'    => $request->ref_id,
                    'file_name' => $filename,
                    'caption'   => $request->caption ?? null,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $media = MediaBansos::findOrFail($id);
        return view('media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media = MediaBansos::findOrFail($id);
        return view('media.edit', compact('media'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $media = MediaBansos::findOrFail($id);

        $request->validate([
            'caption' => 'nullable|string',
            'sort_order' => 'integer'
        ]);

        $media->update([
            'caption' => $request->caption,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return back()->with('success', 'Media berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = MediaBansos::findOrFail($id);

        $path = public_path('uploads/mediabansos/' . $media->file_name);

        if (file_exists($path)) {
            @unlink($path);
        }

        $media->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
