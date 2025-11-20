@extends('guest.layouts.main')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success"><i class="bi bi-people-fill me-2"></i> Pendaftar Bantuan</h3>
            <a href="{{ route('guest.pendaftar_bantuan.create') }}" class="btn btn-success rounded-pill px-3">
                <i class="bi bi-plus-circle"></i> Tambah Pendaftar
            </a>
        </div>

        <div class="row g-4">
            @forelse($data as $row)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale" style="border-top: 5px solid #007a66;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-success mb-1">{{ $row->warga->nama ?? 'Warga #' . $row->warga_id }}</h5>
                            <p class="text-muted small mb-1"><strong>Program:</strong> {{ $row->program->nama_program }}</p>
                            <p class="text-muted small mb-1"><strong>Status:</strong> {{ $row->status_seleksi }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <a href="{{ route('guest.pendaftar_bantuan.edit', $row->pendaftar_id) }}"
                                class="btn btn-sm btn-outline-success rounded-pill px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('guest.pendaftar_bantuan.destroy', $row->pendaftar_id) }}" method="POST"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted mt-4">Belum ada pendaftar.</div>
            @endforelse
        </div>

        {{--  Tambahkan Pagination di sini --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
