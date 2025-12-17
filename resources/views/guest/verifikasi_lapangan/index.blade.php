@extends('guest.layouts.main')

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">
            <i class="bi bi-clipboard-check me-2"></i> Verifikasi Lapangan
        </h3>

        <a href="{{ route('guest.verifikasi_lapangan.create') }}"
           class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Verifikasi
        </a>
    </div>

    {{-- FILTER + SEARCH --}}
    <form method="GET" action="{{ route('guest.verifikasi_lapangan.index') }}" class="mb-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="row align-items-center">

                <div class="col-md-3 mb-3">
                    <label class="fw-bold text-success mb-2">Filter Skor</label>
                    <select name="skor"
                            class="form-select rounded-pill"
                            onchange="this.form.submit()">
                        <option value="">Semua Skor</option>
                        <option value="80" {{ request('skor')==80?'selected':'' }}>≥ 80</option>
                        <option value="60" {{ request('skor')==60?'selected':'' }}>≥ 60</option>
                        <option value="40" {{ request('skor')==40?'selected':'' }}>≥ 40</option>
                        <option value="20" {{ request('skor')==20?'selected':'' }}>≥ 20</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold text-success mb-2">Pencarian</label>
                    <div class="input-group">
                        <input type="text"
                               name="search"
                               class="form-control rounded-start-pill"
                               value="{{ request('search') }}"
                               placeholder="Cari nama pendaftar...">

                        <button class="input-group-text rounded-end-pill">
                            <i class="bi bi-search"></i>
                        </button>

                        @if(request('search') || request('skor'))
                            <a href="{{ route('guest.verifikasi_lapangan.index') }}"
                               class="btn btn-outline-secondary ms-2 rounded-pill">
                                Clear
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </form>

    {{-- LIST VERIFIKASI --}}
    <div class="row g-4">
        @forelse($data as $row)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale"
                 style="border-top:5px solid #007a66; position:relative;">

                {{-- MEDIA THUMBNAIL --}}
                @php
                    $media = $row->media->first();
                @endphp

                @if($media)
                    @if(Str::startsWith($media->mime_type,'image'))
                        <img src="{{ asset($media->file_url) }}"
                             class="card-img-top"
                             style="height:180px; object-fit:cover;">
                    @else
                        <div class="file-preview d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-file-earmark-text-fill text-primary"
                               style="font-size:3rem;"></i>
                            <small class="text-muted mt-2">
                                {{ strtoupper(pathinfo($media->file_url, PATHINFO_EXTENSION)) }}
                            </small>
                        </div>
                    @endif

                    <span class="badge bg-success position-absolute top-0 end-0 m-2">
                        Ada Media
                    </span>
                @else
                    <div class="placeholder-img d-flex justify-content-center align-items-center">
                        <i class="bi bi-image text-secondary" style="font-size:3rem;"></i>
                    </div>

                    <span class="badge bg-secondary position-absolute top-0 end-0 m-2">
                        Belum Upload
                    </span>
                @endif

                {{-- CARD BODY --}}
                <div class="card-body text-center">
                    <h6 class="fw-bold text-success mb-1">
                        {{ $row->pendaftar->warga->nama ?? 'Warga #' . $row->pendaftar_id }}
                    </h6>

                    <p class="text-muted small mb-1">
                        <strong>Petugas:</strong> {{ $row->petugas }}
                    </p>

                    <p class="text-muted small mb-1">
                        <strong>Tanggal:</strong>
                        {{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}
                    </p>

                    <p class="text-muted small mb-1">
                        <strong>Skor:</strong>
                        <span class="fw-semibold text-success">{{ $row->skor }}</span>
                    </p>

                    <p class="text-muted small">
                        <strong>Catatan:</strong>
                        {{ Str::limit($row->catatan, 60) }}
                    </p>
                </div>

                {{-- FOOTER --}}
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">

                    <a href="{{ route('guest.verifikasi_lapangan.detail',$row->verifikasi_id) }}"
                       class="btn btn-sm btn-primary rounded-pill px-3">
                        Detail
                    </a>

                    <a href="{{ route('guest.verifikasi_lapangan.edit',$row->verifikasi_id) }}"
                       class="btn btn-sm btn-outline-success rounded-pill px-3">
                        Edit
                    </a>

                    <form action="{{ route('guest.verifikasi_lapangan.destroy',$row->verifikasi_id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                            Hapus
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @empty
            <div class="text-center text-muted mt-4">
                Belum ada verifikasi lapangan.
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>

</div>

<style>
.hover-scale {
    transition: .3s ease;
}
.hover-scale:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 18px rgba(0,122,102,.15);
}

.placeholder-img {
    height: 180px;
    background: #f2f4f6;
    border-bottom: 1px solid #e0e0e0;
}

.file-preview {
    height: 180px;
    background: #eef6ff;
    border-bottom: 1px solid #d0e2ff;
}
</style>
@endsection
