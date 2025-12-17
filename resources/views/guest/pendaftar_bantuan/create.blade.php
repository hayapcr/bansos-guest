@extends('guest.layouts.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Tambah Pendaftar Bantuan</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftar_bantuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Program Bantuan</label>
                    <select name="program_id" class="form-control" required>
                        <option value="">-- Pilih Program --</option>
                        @foreach ($program as $p)
                            <option value="{{ $p->program_id }}">{{ $p->nama_program }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Warga</label>
                    <select name="warga_id" class="form-control" required>
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Seleksi</label>
                    <input type="text" name="status_seleksi" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Berkas</label>
                    <input type="file" name="media[]" class="form-control" multiple>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.pendaftar_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
