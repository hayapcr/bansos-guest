@extends('guest.layouts.main')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Edit Verifikasi Lapangan</div>
        <div class="card-body">
            <form action="{{ route('guest.verifikasi_lapangan.update', $verif->verifikasi_id) }}"
                  method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- PENDAFTAR --}}
                <div class="mb-3">
                    <label class="form-label">Pendaftar Bantuan</label>
                    <select name="pendaftar_id" class="form-control" required>
                        @foreach ($pendaftar as $p)
                            <option value="{{ $p->pendaftar_id }}"
                                {{ $p->pendaftar_id == $verif->pendaftar_id ? 'selected' : '' }}>
                                {{ $p->warga->nama ?? 'Warga #' . $p->warga_id }} — {{ $p->program->nama_program }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- PETUGAS --}}
                <div class="mb-3">
                    <label class="form-label">Petugas Verifikasi</label>
                    <input type="text" name="petugas" value="{{ $verif->petugas }}" class="form-control" required>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal" value="{{ $verif->tanggal }}" class="form-control" required>
                </div>

                {{-- SKOR --}}
                <div class="mb-3">
                    <label class="form-label">Skor</label>
                    <input type="number" name="skor" value="{{ $verif->skor }}" class="form-control" required>
                </div>

                {{-- CATATAN --}}
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ $verif->catatan }}</textarea>
                </div>

                {{-- MEDIA BARU --}}
                <div class="mb-3">
                    <label class="form-label">Upload Media Baru</label>
                    <input type="file" name="media[]" class="form-control" multiple>
                </div>

                {{-- MEDIA LAMA --}}
                @if($verif->media->count())
                    <label class="form-label mt-3">Media Lama</label>
                    <div class="row">
                        @foreach($verif->media as $m)
                            <div class="col-md-3 text-center mb-3">
                                @if(Str::contains($m->mime_type, 'image'))
                                    <img src="{{ asset($m->file_url) }}" class="img-fluid rounded">
                                @else
                                    <a href="{{ asset($m->file_url) }}" target="_blank" class="btn btn-outline-primary btn-sm">Dokumen</a>
                                @endif

                                <form action="{{ route('guest.verifikasi_lapangan.deleteMedia', $m->media_id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus file ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm mt-2">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('guest.verifikasi_lapangan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
