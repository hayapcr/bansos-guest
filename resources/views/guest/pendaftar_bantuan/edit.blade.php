@extends('guest.layouts.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Edit Pendaftar Bantuan</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftar_bantuan.update', $pendaftar->pendaftar_id) }}" method="POST"> @csrf
                @method('PUT')


                <div class="mb-3">
                    <label class="form-label">Program Bantuan</label>
                    <select name="program_id" class="form-control" required>
                        @foreach ($program as $p)
                            <option value="{{ $p->program_id }}"
                                {{ $p->program_id == $pendaftar->program_id ? 'selected' : '' }}>
                                {{ $p->nama_program }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Warga</label>
                    <select name="warga_id" class="form-control" required>
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}"
                                {{ $w->warga_id == $pendaftar->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Status Seleksi</label>
                    <input type="text" name="status_seleksi" value="{{ $pendaftar->status_seleksi }}"
                        class="form-control">
                </div>


                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.pendaftar_bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
