@extends('guest.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success"><i class="bi bi-gift-fill me-2"></i> Program Bantuan</h3>
        <a href="{{ route('guest.program_bantuan.create') }}" class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Program
        </a>
    </div>

    <div class="row g-4">
        @forelse($data as $row)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale" style="border-top: 5px solid #007a66;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-gift-fill text-success" style="font-size: 2.5rem;"></i>
                    </div>

                    <h5 class="fw-bold text-success mb-1">{{ $row->nama_program }}</h5>
                    <p class="text-muted small mb-1"><strong>Kode:</strong> {{ $row->kode }}</p>
                    <p class="text-muted small mb-1"><strong>Tahun:</strong> {{ $row->tahun }}</p>
                    <p class="text-muted small mb-2"><strong>Anggaran:</strong> Rp{{ number_format($row->anggaran, 0, ',', '.') }}</p>
                    <p class="text-secondary mb-3" style="font-size: 0.9rem;">{{ Str::limit($row->deskripsi, 80) }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('guest.program_bantuan.edit', $row->program_id) }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('guest.program_bantuan.destroy', $row->program_id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-muted mt-4">Belum ada program bantuan.</div>
        @endforelse
    </div>
</div>

<style>
.hover-scale { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.hover-scale:hover { transform: translateY(-6px); box-shadow: 0 10px 18px rgba(0, 122, 102, 0.15); }
</style>
@endsection
