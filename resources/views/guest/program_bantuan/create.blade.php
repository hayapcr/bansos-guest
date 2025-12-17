@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Tambah Program Bantuan
    </div>

    <div class="card-body">
        <form action="{{ route('guest.program_bantuan.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Program</label>
                <input type="text" name="kode" value="{{ old('kode') }}" class="form-control" required>
                @error('kode') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Program</label>
                <input type="text" name="nama_program" value="{{ old('nama_program') }}" class="form-control" required>
                @error('nama_program') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" value="{{ old('tahun') }}" class="form-control" required>
                @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Anggaran (Rp)</label>
                <input type="number" name="anggaran" value="{{ old('anggaran') }}" class="form-control" required>
                @error('anggaran') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- UPLOAD MEDIA --}}
            <div class="mb-3">
                <label class="form-label">Upload File Pendukung (bisa banyak)</label>
                <input type="file" name="media[]" class="form-control" multiple>
                @error('media.*') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.program_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
