@extends('guest.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Data Warga</h3>
        <a href="{{ route('guest.warga.create') }}" class="btn btn-success rounded-pill px-3">
            <i class="bi bi-plus-circle"></i> Tambah Warga
        </a>
    </div>

    {{--  Cek apakah ada data --}}
    @forelse($data as $w)
        <div class="card mb-3 border-0 shadow-sm rounded-4 hover-scale">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap">

                {{--  Ikon Orang --}}
                <div class="d-flex align-items-center me-3">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                         style="width: 70px; height: 70px;">
                        <i class="bi bi-person-circle text-success" style="font-size: 2.5rem;"></i>
                    </div>

                    {{--  Informasi utama warga --}}
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

                {{--  Tombol Aksi --}}
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
</div>

{{--  Tambahkan efek hover agar lebih interaktif --}}
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
