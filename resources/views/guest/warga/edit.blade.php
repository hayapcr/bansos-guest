@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Edit Data Warga
    </div>
    <div class="card-body">
        <form action="{{ route('guest.warga.update', $warga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $warga->nik) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $warga->nama) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $warga->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $warga->no_hp) }}" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.warga.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
