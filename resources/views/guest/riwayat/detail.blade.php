@extends('guest.layouts.main')

@section('content')
<div class="container py-3">

    {{-- ==================== HEADER ==================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-success mb-0">
            <i class="bi bi-clock-history me-1"></i> Detail Riwayat Penyaluran
        </h4>
        <a href="{{ route('guest.riwayat_penyaluran.index') }}"
           class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- ==================== INFORMASI PENYALURAN ==================== --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-info-circle me-1"></i> Informasi Penyaluran
        </div>

        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-gift"></i>
                        <div>
                            <small>Program Bantuan</small>
                            <div class="fw-semibold">
                                {{ $data->program->nama_program }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <i class="bi bi-person-check"></i>
                        <div>
                            <small>Penerima</small>
                            <div class="fw-semibold">
                                {{ $data->penerima->warga->nama }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card">
                        <i class="bi bi-layers"></i>
                        <div>
                            <small>Tahap Ke</small>
                            <div class="fw-semibold">
                                {{ $data->tahap_ke }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card">
                        <i class="bi bi-calendar-event"></i>
                        <div>
                            <small>Tanggal Penyaluran</small>
                            <div class="fw-semibold">
                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-card">
                        <i class="bi bi-cash-stack"></i>
                        <div>
                            <small>Nilai Bantuan</small>
                            <div class="fw-semibold text-success">
                                Rp {{ number_format($data->nilai, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ==================== FILE BUKTI PENYALURAN ==================== --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-paperclip me-1"></i> File Bukti Penyaluran
        </div>

        <div class="card-body">

            {{-- Upload --}}
            <form action="{{ route('guest.riwayat_penyaluran.uploadMedia', $data->penyaluran_id) }}"
                  method="POST" enctype="multipart/form-data"
                  class="row g-2 align-items-end mb-3">
                @csrf

                <div class="col-md-9">
                    <label class="form-label fw-semibold mb-1">
                        Upload File (boleh banyak)
                    </label>
                    <input type="file" name="media[]" class="form-control" multiple>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </div>
            </form>

            <hr class="my-3">

            {{-- List Media --}}
            <h6 class="fw-bold mb-3">Daftar File</h6>

            <div class="row g-3">
            @forelse($data->media as $m)

                <div class="col-md-4 col-sm-6">
                    <div class="media-card">

                        {{-- Preview --}}
                        @if(Str::startsWith($m->mime_type, 'image'))
                            <a href="{{ asset($m->file_url) }}" target="_blank">
                                <img src="{{ asset($m->file_url) }}" alt="Bukti Penyaluran">
                            </a>
                        @else
                            <a href="{{ asset($m->file_url) }}" target="_blank"
                               class="file-link">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>{{ basename($m->file_url) }}</span>
                            </a>
                        @endif

                        <div class="media-footer">
                            <small class="text-muted">
                                {{ $m->mime_type }}
                            </small>

                            <form action="{{ route('guest.riwayat_penyaluran.media.delete', $m->media_id) }}"
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
                <div class="col-12">
                    <p class="text-muted mb-0">Belum ada file bukti penyaluran.</p>
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
    background: #fff;
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
