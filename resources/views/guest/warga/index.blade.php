@extends('guest.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Data Warga</h3>
        <a href="{{ route('guest.warga.create') }}" class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Warga
        </a>
    </div>

    {{-- FILTER + SEARCH FORM --}}
    <form method="GET" action="{{ route('guest.warga.index') }}" class="mb-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="row align-items-center">

                {{-- FILTER JENIS KELAMIN --}}
                <div class="col-md-3 mb-3">
                    <label class="fw-bold text-success mb-2">Filter Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select rounded-pill"
                            onchange="this.form.submit()">
                        <option value="">Semua</option>
                        <option value="Laki-laki" {{ request('jenis_kelamin')=='Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin')=='Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-md-3 mb-3">
                    <label class="fw-bold text-success mb-2">Pencarian</label>
                    <div class="input-group">

                        <input type="text" name="search" class="form-control rounded-start-pill"
                               value="{{ request('search') }}"
                               placeholder="Cari nama / KTP">

                        <button type="submit" class="input-group-text rounded-end-pill">
                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        {{-- ========== TOMBOL CLEAR (DITAMBAHKAN) ========== --}}
                        @if(request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                               class="btn btn-outline-secondary ms-2 rounded-pill"
                               id="clear-search">
                                Clear
                            </a>
                        @endif
                        {{-- ========== END TOMBOL CLEAR ========== --}}

                    </div>
                </div>

            </div>
        </div>
    </form>
    {{-- END FILTER FORM --}}

    {{-- LIST DATA WARGA --}}
    @forelse($data as $w)
        <div class="card mb-3 border-0 shadow-sm rounded-4 hover-scale">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap">

                <div class="d-flex align-items-center me-3">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                         style="width: 70px; height: 70px;">
                        <i class="bi bi-person-circle text-success" style="font-size: 2.5rem;"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold text-success mb-1">{{ $w->nama }}</h5>
                        <small class="d-block text-muted">No KTP: {{ $w->no_ktp }}</small>
                        <small class="d-block text-muted">Jenis Kelamin: {{ $w->jenis_kelamin }}</small>
                        <small class="d-block text-muted">Agama: {{ $w->agama }}</small>
                        <small class="d-block text-muted">Pekerjaan: {{ $w->pekerjaan ?? '-' }}</small>
                        <small class="d-block text-muted">Telepon: {{ $w->telp ?? '-' }}</small>
                        <small class="d-block text-muted">Email: {{ $w->email ?? '-' }}</small>
                    </div>
                </div>

                <div class="mt-3 mt-md-0 text-end">
                    <a href="{{ route('guest.warga.edit', $w->warga_id) }}"
                       class="btn btn-sm btn-outline-success rounded-pill me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('guest.warga.destroy', $w->warga_id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger rounded-pill">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @empty
        <div class="text-center text-muted mt-4">Belum ada data warga.</div>
    @endforelse

    {{-- PAGINATION --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>

</div>

<style>
.hover-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-scale:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0, 122, 102, 0.15);
}
.icon-wrapper {
    flex-shrink: 0;
}
</style>
@endsection
