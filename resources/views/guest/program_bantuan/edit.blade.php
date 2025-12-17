@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Edit Program Bantuan
    </div>
    <div class="card-body">
        <form action="{{ route('guest.program_bantuan.update', $program->program_id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Program</label>
                <input type="text" name="kode" value="{{ $program->kode }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Program</label>
                <input type="text" name="nama_program" value="{{ $program->nama_program }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" value="{{ $program->tahun }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $program->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Anggaran (Rp)</label>
                <input type="number" name="anggaran" value="{{ $program->anggaran }}" class="form-control" required>
            </div>

            {{-- UPLOAD FILE BARU --}}
            <div class="mb-3">
                <label class="form-label">Tambah File Pendukung</label>
                <input type="file" name="media[]" class="form-control" multiple>
            </div>

            {{-- FILE YANG SUDAH ADA --}}
            <div class="mb-3">
                <label class="fw-bold">File Saat Ini:</label>
                <ul class="list-group">
                    @foreach($program->media as $file)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $file->file_name }}</span>
                            <form action="{{ route('guest.program_bantuan.media.delete', $file->media_id) }}"
                                  method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.program_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
