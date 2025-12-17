@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">
        Edit Riwayat Penyaluran
    </div>

    <div class="card-body">

        <form action="{{ route('guest.riwayat_penyaluran.update', $data->penyaluran_id) }}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- PROGRAM --}}
            <div class="mb-3">
                <label class="form-label">Program Bantuan</label>
                <select name="program_id" class="form-control">
                    @foreach ($program as $p)
                        <option value="{{ $p->program_id }}"
                            {{ $p->program_id == $data->program_id ? 'selected' : '' }}>
                            {{ $p->nama_program }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- PENERIMA --}}
            <div class="mb-3">
                <label class="form-label">Penerima Bantuan</label>
                <select name="penerima_id" class="form-control">
                    @foreach ($penerima as $pn)
                        <option value="{{ $pn->penerima_id }}"
                            {{ $pn->penerima_id == $data->penerima_id ? 'selected' : '' }}>
                            {{ $pn->warga->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- TAHAP --}}
            <div class="mb-3">
                <label class="form-label">Tahap Ke</label>
                <input type="number" name="tahap_ke" class="form-control" value="{{ $data->tahap_ke }}">
            </div>

            {{-- TANGGAL --}}
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}">
            </div>

            {{-- NILAI --}}
            <div class="mb-3">
                <label class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control" value="{{ $data->nilai }}">
            </div>

            {{-- BUKTI --}}
            <div class="mb-3">
                <label class="form-label">Upload Bukti Baru</label>
                <input type="file" name="bukti_penyaluran" class="form-control">

                @if($data->bukti_penyaluran)
                    <small class="text-muted d-block mt-2">
                        File lama:
                        <a href="{{ asset('uploads/riwayat/'.$data->bukti_penyaluran) }}" target="_blank">
                            Lihat
                        </a>
                    </small>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.riwayat_penyaluran.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button class="btn btn-success">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
