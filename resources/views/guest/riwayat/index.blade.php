@extends('guest.layouts.main')

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">
            <i class="bi bi-clipboard-check me-2"></i> Riwayat Penyaluran
        </h3>

        <a href="{{ route('guest.riwayat_penyaluran.create') }}"
           class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Riwayat
        </a>
    </div>

    {{-- FILTER + SEARCH --}}
    <form method="GET" action="{{ route('guest.riwayat_penyaluran.index') }}" class="mb-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="row align-items-center">

                {{-- FILTER PROGRAM --}}
                <div class="col-md-4 mb-3">
                    <label class="fw-bold text-success mb-2">Filter Program</label>
                    <select name="program_id" class="form-select rounded-pill" onchange="this.form.submit()">
                        <option value="">Semua Program</option>
                        @foreach ($program as $p)
                            <option value="{{ $p->program_id }}" {{ request('program_id') == $p->program_id ? 'selected' : '' }}>
                                {{ $p->nama_program }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold text-success mb-2">Cari Nama Warga</label>
                    <div class="input-group">
                        <input type="text" name="search"
                               class="form-control rounded-start-pill"
                               placeholder="Cari nama warga..."
                               value="{{ request('search') }}">

                        <button class="input-group-text rounded-end-pill">
                            <i class="bi bi-search"></i>
                        </button>

                        @if(request('search') || request('program_id'))
                            <a href="{{ route('guest.riwayat_penyaluran.index') }}"
                               class="btn btn-outline-secondary ms-2 rounded-pill">
                                Clear
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </form>

    {{-- LIST RIWAYAT --}}
    <div class="row g-4">
        @forelse($data as $row)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale" style="border-top:5px solid #007a66;">

                
                {{-- MEDIA PREVIEW --}}
                @php
                    $media = $row->media->first();
                @endphp

                @if($media)
                    @if(Str::startsWith($media->mime_type,'image'))
                        <img src="{{ asset($media->file_url) }}"
                             class="card-img-top"
                             style="height:180px;object-fit:cover;">
                    @else
                        <div class="file-preview d-flex flex-column justify-content-center align-items-center" style="height:180px;background:#eef6ff;border-bottom:1px solid #d0e2ff;">
                            <i class="bi bi-file-earmark-text-fill text-primary" style="font-size:3rem;"></i>
                            <small class="text-muted mt-2">{{ strtoupper(pathinfo($media->file_url, PATHINFO_EXTENSION)) }}</small>
                        </div>
                    @endif
                @else
                    <div class="placeholder-img d-flex justify-content-center align-items-center" style="height:180px;background:#f8f9fa;border-bottom:1px solid #e0e0e0;">
                        <i class="bi bi-file-earmark-check text-secondary" style="font-size:3rem;"></i>
                        <small class="text-muted mt-2">Belum ada bukti</small>
                    </div>
                @endif

                {{-- CARD BODY --}}
                <div class="card-body text-center">
                    <h6 class="fw-bold text-success mb-1">{{ $row->program->nama_program }}</h6>

                    <p class="text-muted small mb-1">
                        <strong>Penerima:</strong> {{ $row->penerima->warga->nama ?? 'Warga #'.$row->penerima_id }}
                    </p>

                    <p class="text-muted small mb-1">
                        <strong>Tahap:</strong> {{ $row->tahap_ke }}
                    </p>

                    <p class="text-muted small mb-1">
                        <strong>Tanggal:</strong> {{ $row->tanggal }}
                    </p>

                    <p class="text-muted small">
                        <strong>Nilai:</strong> Rp {{ number_format($row->nilai,0,',','.') }}
                    </p>
                </div>

                {{-- FOOTER --}}
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('guest.riwayat_penyaluran.show',$row->penyaluran_id) }}"
                       class="btn btn-sm btn-primary rounded-pill px-3">Detail</a>

                    <a href="{{ route('guest.riwayat_penyaluran.edit',$row->penyaluran_id) }}"
                       class="btn btn-sm btn-outline-success rounded-pill px-3">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('guest.riwayat_penyaluran.destroy',$row->penyaluran_id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @empty
            <div class="text-center text-muted mt-4">
                Belum ada riwayat penyaluran.
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>

</div>

{{-- STYLE --}}
<style>
.hover-scale {
    transition: 0.3s ease;
}
.hover-scale:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 18px rgba(0, 122, 102, 0.15);
}
</style>
@endsection
