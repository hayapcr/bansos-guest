@extends('guest.layouts.main')

@section('content')
<div class="container py-3">

    {{-- ==================== HEADER ==================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-success mb-0">
            <i class="bi bi-person-lines-fill me-1"></i> Detail Pendaftar Bantuan
        </h4>
        <a href="{{ route('guest.pendaftar_bantuan.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- ==================== INFORMASI PENDAFTAR ==================== --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-info-circle me-1"></i> Informasi Pendaftar
        </div>

        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-gift"></i>
                        <div>
                            <small>Program Bantuan</small>
                            <div class="fw-semibold">
                                {{ $pendaftar->program->nama_program }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-person"></i>
                        <div>
                            <small>Nama Warga</small>
                            <div class="fw-semibold">
                                {{ $pendaftar->warga->nama }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-clipboard-check"></i>
                        <div>
                            <small>Status Seleksi</small>
                            <div>
                                <span class="badge
                                    @if($pendaftar->status_seleksi == 'diterima') bg-success
                                    @elseif($pendaftar->status_seleksi == 'ditolak') bg-danger
                                    @else bg-warning text-dark
                                    @endif">
                                    {{ ucfirst($pendaftar->status_seleksi) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ==================== BERKAS PENDAFTARAN ==================== --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-paperclip me-1"></i> Berkas Pendaftaran
        </div>

        <div class="card-body">
            <div class="row g-3">

                @forelse ($pendaftar->media as $m)
                <div class="col-md-6">
                    <div class="media-card">

                        {{-- PREVIEW --}}
                        @if(Str::startsWith($m->mime_type, 'image'))
                            <a href="{{ asset($m->file_url) }}" target="_blank">
                                <img src="{{ asset($m->file_url) }}" alt="Berkas">
                            </a>
                        @else
                            <a href="{{ asset($m->file_url) }}" target="_blank" class="file-link">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>{{ basename($m->file_url) }}</span>
                            </a>
                        @endif

                        {{-- FOOTER --}}
                        <div class="media-footer">
                            <small class="text-muted">
                                {{ $m->mime_type }}
                            </small>

                            <div class="d-flex gap-1">

                                {{-- VIEW --}}
                                <a href="{{ asset($m->file_url) }}" target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('guest.pendaftar_bantuan.media.delete', $m->media_id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus berkas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted mb-0">Belum ada berkas diunggah.</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>

</div>

{{-- ==================== STYLE ==================== --}}
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
