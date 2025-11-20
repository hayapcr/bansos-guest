@extends('guest.layouts.main')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success"><i class="bi bi-clipboard-check me-2"></i> Verifikasi Lapangan</h3>
            <a href="{{ route('guest.verifikasi_lapangan.create') }}" class="btn btn-success rounded-pill px-3">
                <i class="bi bi-plus-circle"></i> Tambah Verifikasi
            </a>
        </div>

        <div class="row g-4">
            @forelse($data as $row)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale" style="border-top: 5px solid #007a66;">
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-success mb-1">Pendaftar:
                                {{ $row->pendaftar->warga->nama ?? 'Warga #' . $row->pendaftar_id }}</h6>
                            <p class="text-muted small mb-1"><strong>Petugas:</strong> {{ $row->petugas }}</p>
                            <p class="text-muted small mb-1"><strong>Tanggal:</strong> {{ $row->tanggal }}</p>
                            <p class="text-muted small mb-1"><strong>Skor:</strong> {{ $row->skor }}</p>
                            <p class="text-muted small"><strong>Catatan:</strong> {{ Str::limit($row->catatan, 50) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <a href="{{ route('guest.verifikasi_lapangan.edit', $row->verifikasi_id) }}"
                                class="btn btn-sm btn-outline-success rounded-pill px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('guest.verifikasi_lapangan.destroy', $row->verifikasi_id) }}"
                                method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted mt-4">Belum ada verifikasi lapangan.</div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
