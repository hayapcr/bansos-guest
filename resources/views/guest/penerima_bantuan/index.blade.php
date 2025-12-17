@extends('guest.layouts.main')
@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">
            <i class="bi bi-people-fill me-2"></i> Penerima Bantuan
        </h3>
        <a href="{{ route('guest.penerima_bantuan.create') }}"
           class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Penerima
        </a>
    </div>

    {{-- FILTER PROGRAM & SEARCH WARGA --}}
    <form method="GET" action="{{ route('guest.penerima_bantuan.index') }}" class="mb-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="row g-3 align-items-end">

                <div class="col-md-4">
                    <label class="fw-bold text-success mb-2">Filter Program</label>
                    <select name="program_id" class="form-select rounded-pill" onchange="this.form.submit()">
                        <option value="">Semua Program</option>
                        @foreach($programs ?? [] as $p)
                            <option value="{{ $p->program_id }}" {{ request('program_id') == $p->program_id ? 'selected' : '' }}>
                                {{ $p->nama_program ?? $p->title ?? 'Program #' . $p->program_id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="fw-bold text-success mb-2">Pencarian Warga</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start-pill"
                               value="{{ request('search') }}" placeholder="Cari nama warga...">
                        <button class="input-group-text rounded-end-pill" type="submit">
                            <i class="bi bi-search"></i>
                        </button>

                        @if(request('search') || request('program_id'))
                            <a href="{{ route('guest.penerima_bantuan.index') }}" class="btn btn-outline-secondary ms-2 rounded-pill">Clear</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </form>

    {{-- LIST DATA --}}
    <div class="row g-4">
        @forelse($data as $row)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale" style="border-top: 5px solid #198754;">
                    <div class="card-body text-center">
                        <h6 class="fw-bold text-success mb-1">
                            {{ $row->warga->nama ?? 'Warga #' . $row->warga_id }}
                        </h6>
                        <p class="text-muted small mb-1"><strong>Program:</strong> {{ $row->program->nama_program ?? '—' }}</p>
                        <p class="text-muted small"><strong>Keterangan:</strong> {{ Str::limit($row->keterangan, 80) }}</p>
                    </div>

                    <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                        <a href="{{ route('guest.penerima_bantuan.edit', $row->penerima_id) }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
                            <i class="bi bi-pencil"></i> Edit
                        </a>

                        <form action="{{ route('guest.penerima_bantuan.destroy', $row->penerima_id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted mt-4">Belum ada data penerima bantuan.</div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>

</div>

<style>
.hover-scale { transition: transform .3s ease, box-shadow .3s ease; }
.hover-scale:hover { transform: translateY(-4px); box-shadow: 0 8px 16px rgba(0,0,0,.08); }
</style>
@endsection
