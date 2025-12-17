@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Tambah Riwayat Penyaluran
    </div>

    <div class="card-body">

        <form action="{{ route('guest.riwayat_penyaluran.store') }}"
              method="POST" enctype="multipart/form-data">

            @csrf

            {{-- PROGRAM --}}
            <div class="mb-3">
                <label class="form-label">Program Bantuan</label>
                <select name="program_id" class="form-control" required>
                    <option value="">-- Pilih Program --</option>
                    @foreach ($program as $p)
                        <option value="{{ $p->program_id }}">{{ $p->nama_program }}</option>
                    @endforeach
                </select>
            </div>

            {{-- PENERIMA --}}
            <div class="mb-3">
                <label class="form-label">Penerima Bantuan</label>
                <select name="penerima_id" class="form-control" required>
                    <option value="">-- Pilih Penerima --</option>
                    @foreach ($penerima as $pn)
                        <option value="{{ $pn->penerima_id }}">
                            {{ $pn->warga->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- TAHAP --}}
            <div class="mb-3">
                <label class="form-label">Tahap Ke</label>
                <input type="number" name="tahap_ke" class="form-control" required>
            </div>

            {{-- TANGGAL --}}
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            {{-- NILAI --}}
            <div class="mb-3">
                <label class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control" step="0.01" required>
            </div>

            {{-- BUKTI --}}
            <div class="mb-3">
                <label class="form-label">Upload Bukti</label>
                <input type="file" name="bukti_penyaluran" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.riwayat_penyaluran.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
