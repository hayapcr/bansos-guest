@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Edit Program Bantuan
    </div>
    <div class="card-body">
        <form action="{{ route('guest.program_bantuan.update', $program->program_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Program</label>
                <input type="text" name="kode" value="{{ old('kode', $program->kode) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Program</label>
                <input type="text" name="nama_program" value="{{ old('nama_program', $program->nama_program) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" value="{{ old('tahun', $program->tahun) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $program->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Anggaran (Rp)</label>
                <input type="number" step="0.01" name="anggaran" value="{{ old('anggaran', $program->anggaran) }}" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.program_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
