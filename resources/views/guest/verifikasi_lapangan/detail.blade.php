@extends('guest.layouts.main')

@section('content')
<div class="container py-3">

    {{-- ==================== HEADER ==================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-success mb-0">
            <i class="bi bi-clipboard-data me-1"></i> Detail Verifikasi Lapangan
        </h4>
        <a href="{{ route('guest.verifikasi_lapangan.index') }}"
           class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- ==================== INFORMASI VERIFIKASI ==================== --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-info-circle me-1"></i> Informasi Verifikasi
        </div>

        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-person"></i>
                        <div>
                            <small>Pendaftar</small>
                            <div class="fw-semibold">
                                {{ $verif->pendaftar->warga->nama }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-person-badge"></i>
                        <div>
                            <small>Petugas Verifikasi</small>
                            <div class="fw-semibold">
                                {{ $verif->petugas }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-calendar-event"></i>
                        <div>
                            <small>Tanggal Verifikasi</small>
                            <div class="fw-semibold">
                                {{ \Carbon\Carbon::parse($verif->tanggal)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-bar-chart-fill"></i>
                        <div>
                            <small>Skor</small>
                            <div class="fw-semibold text-success">
                                {{ $verif->skor }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="info-card align-items-start">
                        <i class="bi bi-chat-left-text"></i>
                        <div>
                            <small>Catatan Verifikasi</small>
                            <div class="fw-semibold">
                                {{ $verif->catatan ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ==================== MEDIA VERIFIKASI ==================== --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-image me-1"></i> Media Verifikasi
        </div>

        <div class="card-body">
            <div class="row g-3">

            @forelse($verif->media as $m)
                <div class="col-md-4 col-sm-6">
                    <div class="media-card">

                        {{-- Preview Media --}}
                        @if(Str::startsWith($m->mime_type, 'image'))
                            <a href="{{ asset($m->file_url) }}" target="_blank">
                                <img src="{{ asset($m->file_url) }}" alt="Media Verifikasi">
                            </a>
                        @else
                            <a href="{{ asset($m->file_url) }}" target="_blank"
                               class="file-link">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>{{ basename($m->file_url) }}</span>
                            </a>
                        @endif

                        {{-- FOOTER MEDIA --}}
                        <div class="media-footer">
                            <small class="text-muted">
                                {{ $m->mime_type }}
                            </small>

                            <div class="d-flex gap-1">

                                {{-- LIHAT --}}
                                <a href="{{ asset($m->file_url) }}" target="_blank"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('guest.verifikasi_lapangan.media.delete', $m->media_id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted mb-0">Belum ada media verifikasi.</p>
                </div>
            @endforelse

            </div>
        </div>
    </div>

</div>

{{-- ==================== STYLE TAMBAHAN ==================== --}}
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
    color: #198754;
}
.info-card:hover {
    background: #eefaf3;
}

.media-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    overflow: hidden;
    transition: .2s;
    background: #fff;
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
