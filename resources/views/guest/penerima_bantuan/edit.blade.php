@extends('guest.layouts.main')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Edit Penerima Bantuan</div>
        <div class="card-body">
            <form action="{{ route('guest.penerima_bantuan.update', $item->penerima_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Program Bantuan</label>
                    <select name="program_id" class="form-control" required>
                        <option value="">-- Pilih Program --</option>
                        @foreach ($programs as $p)
                            <option value="{{ $p->program_id }}" {{ $item->program_id == $p->program_id ? 'selected' : '' }}>
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
                            <option value="{{ $w->warga_id }}" {{ $item->warga_id == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama ?? 'Warga #' . $w->warga_id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $item->keterangan) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.penerima_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
