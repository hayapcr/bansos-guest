@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">Tambah Data Warga</div>
    <div class="card-body">
        <form action="{{ route('guest.warga.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">No KTP</label>
                <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Agama</label>
                <input type="text" name="agama" value="{{ old('agama') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="telp" value="{{ old('telp') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.warga.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
