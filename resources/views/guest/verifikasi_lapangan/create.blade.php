@extends('guest.layouts.main')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Tambah Verifikasi Lapangan</div>
        <div class="card-body">
            <form action="{{ route('guest.verifikasi_lapangan.store') }}"
                  method="POST" enctype="multipart/form-data">

                @csrf

                {{-- PILIH PENDAFTAR --}}
                <div class="mb-3">
                    <label class="form-label">Pendaftar Bantuan</label>
                    <select name="pendaftar_id" class="form-control" required>
                        <option value="">-- Pilih Pendaftar --</option>
                        @foreach ($pendaftar as $p)
                            <option value="{{ $p->pendaftar_id }}">
                                {{ $p->warga->nama ?? 'Warga #' . $p->warga_id }} — {{ $p->program->nama_program }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- PETUGAS --}}
                <div class="mb-3">
                    <label class="form-label">Petugas Verifikasi</label>
                    <input type="text" name="petugas" class="form-control" required>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- SKOR --}}
                <div class="mb-3">
                    <label class="form-label">Skor</label>
                    <input type="number" name="skor" class="form-control" required>
                </div>

                {{-- CATATAN --}}
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3"></textarea>
                </div>

                {{-- MEDIA --}}
                <div class="mb-3">
                    <label class="form-label">Upload Foto / Dokumen</label>
                    <input type="file" name="media[]" class="form-control" multiple>
                    <small class="text-muted">Boleh upload banyak file (jpg, png, pdf, docx)</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.verifikasi_lapangan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
