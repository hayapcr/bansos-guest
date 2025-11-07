@extends('guest.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success d-flex align-items-center">
            {{-- 📖 Icon Buku/Alamat --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 2H8a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h11V2zM6 4v16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h1zm11 15H8V5h9v14z"/>
            </svg>
            Hubungi Kami
        </h3>
    </div>

    <div class="row g-4">
        {{-- Info Kontak --}}
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 hover-scale h-100">
                <div class="card-body">
                    {{-- Alamat --}}
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:65px;height:65px;">
                            {{-- 📍 Icon Lokasi --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Alamat</h6>
                            <p class="mb-0 text-muted">Jl. Jendral Sudirman 18–19 Otista, Pekanbaru 13330</p>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:65px;height:65px;">
                            {{-- ☎ Icon Telepon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" viewBox="0 0 24 24">
                                <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 .91-.27 11.72 11.72 0 0 0 3.69.59 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1 17 17 0 0 1-15-15 1 1 0 0 1 1-1h2.5a1 1 0 0 1 1 1 11.72 11.72 0 0 0 .59 3.69 1 1 0 0 1-.27.91l-2.24 2.2z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Telepon</h6>
                            <p class="mb-0 text-muted">(021) 8199749 / 8519611</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:65px;height:65px;">
                            {{-- ✉ Icon Email --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" viewBox="0 0 24 24">
                                <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8l8 5 8-5v10H4z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Email</h6>
                            <p class="mb-0 text-muted">redaksi@binadesa.org</p>
                        </div>
                    </div>

                    <hr>

                    {{-- Sosial Media --}}
                    <div class="d-flex align-items-center mt-3">
                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:65px;height:65px;">
                            {{-- 🔗 Icon Share --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="green" viewBox="0 0 24 24">
                                <path d="M18 16.08c-.76 0-1.44.3-1.96.77l-7.12-4.03a2.49 2.49 0 0 0 0-1.64l7.12-4.03A2.5 2.5 0 1 0 14.5 5a2.5 2.5 0 0 0 0 .64l-7.12 4.03a2.5 2.5 0 1 0 0 4.66l7.12 4.03A2.5 2.5 0 1 0 18 16.08z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-2">Ikuti Kami</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.594 0 0 .6 0 1.33v21.34C0 23.4.594 24 1.325 24h11.495v-9.294H9.692V11.01h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.1 2.795.143v3.24h-1.918c-1.504 0-1.794.716-1.794 1.765v2.31h3.59l-.467 3.696h-3.123V24h6.125C23.406 24 24 23.4 24 22.67V1.33C24 .6 23.406 0 22.675 0z"/></svg></a>
                                <a href="#" class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green" viewBox="0 0 24 24"><path d="M12 2.2c3.204 0 3.584.012 4.849.07 1.366.063 2.633.326 3.608 1.3.974.974 1.237 2.241 1.3 3.607.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.849c-.063 1.366-.326 2.633-1.3 3.608-.974.974-2.241 1.237-3.607 1.3-1.266.058-1.646.07-4.85.07s-3.584-.012-4.849-.07c-1.366-.063-2.633-.326-3.608-1.3-.974-.974-1.237-2.241-1.3-3.607C2.212 15.785 2.2 15.405 2.2 12.2s.012-3.584.07-4.849c.063-1.366.326-2.633 1.3-3.608.974-.974 2.241-1.237 3.607-1.3C8.415 2.212 8.795 2.2 12 2.2zm0 1.8c-3.162 0-3.527.012-4.77.07-1.064.049-1.64.226-2.016.377-.508.197-.871.43-1.252.81-.38.38-.613.743-.81 1.252-.151.375-.328.952-.377 2.016-.058 1.243-.07 1.608-.07 4.77s.012 3.527.07 4.77c.049 1.064.226 1.64.377 2.016.197.508.43.871.81 1.252.38.38.743.613 1.252.81.375.151.952.328 2.016.377 1.243.058 1.608.07 4.77.07s3.527-.012 4.77-.07c1.064-.049 1.64-.226 2.016-.377.508-.197.871-.43 1.252-.81.38-.38.613-.743.81-1.252.151-.375.328-.952.377-2.016.058-1.243.07-1.608.07-4.77s-.012-3.527-.07-4.77c-.049-1.064-.226-1.64-.377-2.016-.197-.508-.43-.871-.81-1.252-.38-.38-.743-.613-1.252-.81-.375-.151-.952-.328-2.016-.377C15.527 4.012 15.162 4 12 4zm0 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4zm6.406-.846a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4z"/></svg></a>
                                <a href="#" class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="green" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 4.84 0 10.8c0 3.03 1.53 5.75 3.96 7.62L3 24l5.45-2.99c1.1.3 2.26.46 3.55.46 6.63 0 12-4.84 12-10.8S18.63 0 12 0zm.06 19.67c-1.05 0-2.08-.13-3.07-.4l-.22-.06-3.25 1.8.68-3.74-.27-.24C4.07 15.48 3 13.26 3 10.8 3 6.48 7.02 3 12.06 3c4.96 0 9 3.47 9 7.8s-4.04 7.87-9 7.87z"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Kontak --}}
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 hover-scale">
                <h4 class="fw-bold text-success mb-3 d-flex align-items-center">
                    {{-- ✈ Icon Pesan --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="22" height="22" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/>
                    </svg>
                    Kirim Pesan
                </h4>
                <p class="text-muted mb-4">Isi formulir di bawah ini untuk menghubungi kami secara langsung.</p>

                <form action="{{ route('guest.kontak.kirim') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1 text-success" width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/></svg>
                            Nama
                        </label>
                        <input id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1 text-success" width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 13.065L1.5 6.75V18a2 2 0 0 0 2 2h17a2 2 0 0 0 2-2V6.75L12 13.065zM12 10L22 4H2l10 6z"/></svg>
                            Email
                        </label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1 text-success" width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M21 6h-2v9H5v2h13l4 4V6zM17 2H3c-1.1 0-2 .9-2 2v16l4-4h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                            Pesan
                        </label>
                        <textarea id="message" name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2 fw-semibold d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/>
                        </svg>
                        Kirim Sekarang
                    </button>
                </form>
            </div>
        </div>
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
