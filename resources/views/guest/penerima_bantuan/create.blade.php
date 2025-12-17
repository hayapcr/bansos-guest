@extends('guest.layouts.main')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Tambah Penerima Bantuan</div>
        <div class="card-body">
            <form action="{{ route('guest.penerima_bantuan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Program Bantuan</label>
                    <select name="program_id" class="form-control" required>
                        <option value="">-- Pilih Program --</option>
                        @foreach ($programs as $p)
                            <option value="{{ $p->program_id }}">
                                {{ $p->nama_program ?? $p->title ?? 'Program #' . $p->program_id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Warga</label>
                    <select name="warga_id" class="form-control" required>
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}">
                                {{ $w->nama ?? 'Warga #' . $w->warga_id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.penerima_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
