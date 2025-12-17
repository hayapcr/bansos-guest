@extends('guest.layouts.main')

@section('content')
<div class="container py-3">

    {{-- ==================== HEADER ==================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-success mb-0">
            <i class="bi bi-info-circle me-1"></i> Detail Program Bantuan
        </h4>
        <a href="{{ route('guest.program_bantuan.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- ==================== INFORMASI UMUM ==================== --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-card-text me-1"></i> Informasi Umum
        </div>

        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-bookmark-star"></i>
                        <div>
                            <small>Nama Program</small>
                            <div class="fw-semibold">{{ $program->nama_program }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-hash"></i>
                        <div>
                            <small>Kode Program</small>
                            <div class="fw-semibold">{{ $program->kode }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-calendar-event"></i>
                        <div>
                            <small>Tahun</small>
                            <div class="fw-semibold">{{ $program->tahun }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-cash-coin text-success"></i>
                        <div>
                            <small>Anggaran</small>
                            <div class="fw-bold text-success">
                                Rp {{ number_format($program->anggaran, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <small class="text-muted fw-semibold">Deskripsi</small>
            <p class="text-muted mb-0">
                {{ $program->deskripsi ?? '-' }}
            </p>
        </div>
    </div>

    {{-- ==================== FILE PENDUKUNG ==================== --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-paperclip me-1"></i> File Pendukung
        </div>

        <div class="card-body">

            {{-- Upload --}}
            <form action="{{ route('guest.program_bantuan.uploadMedia', $program->program_id) }}"
                  method="POST" enctype="multipart/form-data"
                  class="row g-2 mb-3">
                @csrf
                <div class="col-md-9">
                    <input type="file" name="media[]" class="form-control" multiple>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </div>
            </form>

            <div class="row g-3">
            @forelse ($program->media as $m)
                <div class="col-md-6">
                    <div class="media-card">

                        @if(Str::startsWith($m->mime_type, 'image'))
                            <a href="{{ asset($m->file_url) }}" target="_blank">
                                <img src="{{ asset($m->file_url) }}" alt="media">
                            </a>
                        @else
                            <a href="{{ asset($m->file_url) }}" target="_blank"
                               class="file-link">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>{{ basename($m->file_url) }}</span>
                            </a>
                        @endif

                        <div class="media-footer">
                            <small>{{ $m->mime_type }}</small>

                            <form action="{{ route('guest.program_bantuan.media.delete', $m->media_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus file ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-muted">
                    Belum ada file pendukung.
                </div>
            @endforelse
            </div>

        </div>
    </div>

</div>

{{-- ==================== STYLE KHUSUS ==================== --}}
<style>
.info-card {
    display: flex;
    gap: 12px;
    padding: 14px;
    border-radius: 12px;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    align-items: center;
    transition: .2s;
}
.info-card i {
    font-size: 1.6rem;
    color: #0d6efd;
}
.info-card:hover {
    background: #eef6ff;
}

.media-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    overflow: hidden;
    transition: .2s;
}
.media-card:hover {
    box-shadow: 0 8px 18px rgba(0,0,0,.08);
}
.media-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}
.file-link {
    display: flex;
    gap: 10px;
    padding: 20px;
    text-decoration: none;
    align-items: center;
}
.file-link i {
    font-size: 2rem;
    color: #0d6efd;
}
.media-footer {
    padding: 10px 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fafafa;
}
</style>
@endsection
