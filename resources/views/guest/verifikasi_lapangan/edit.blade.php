@extends('guest.layouts.main')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Edit Verifikasi Lapangan</div>
        <div class="card-body">
            <form action="{{ route('guest.verifikasi_lapangan.update', $verifikasi->verifikasi_id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label class="form-label">Pendaftar Bantuan</label>
                    <select name="pendaftar_id" class="form-control" required>
                        @foreach ($pendaftar as $p)
                            <option value="{{ $p->pendaftar_id }}"
                                {{ $p->pendaftar_id == $verifikasi->pendaftar_id ? 'selected' : '' }}>
                                {{ $p->warga->nama ?? 'Warga #' . $p->warga_id }} — {{ $p->program->nama_program }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Petugas Verifikasi</label>
                    <input type="text" name="petugas" value="{{ $verifikasi->petugas }}" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal" value="{{ $verifikasi->tanggal }}" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Skor</label>
                    <input type="number" name="skor" value="{{ $verifikasi->skor }}" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ $verifikasi->catatan }}</textarea>
                </div>


                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.verifikasi_lapangan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
