@extends('guest.layouts.main')

@section('content')
<div class="container py-5">
    <div class="profile-card text-center mx-auto">
        <img src="{{ asset('assets-guest/img/haya.jpg') }}" alt="Foto Haya Nur Rizky" class="mb-3">
        <h3 class="fw-bold">Haya Nur Rizky</h3>
        <p class="text-muted-custom mb-1">Prodi: Sistem Informasi</p>
        <p class="text-muted-custom mb-3">NIM: 2457301066</p>
        <hr>
        <div class="d-flex justify-content-center gap-3 mb-3 social-icons">
            <a href="https://www.linkedin.com/in/haya-nur-rizky-9a2a42331/" target="_blank" class="text-primary">
    <i class="bi bi-linkedin"></i>
</a>

            <a href="https://github.com/hayapcr/bansos-guest.git" target="_blank" class="text-dark"><i class="bi bi-github"></i></a>
            <a href="https://instagram.com/hayanr_25" target="_blank" class="text-danger"><i class="bi bi-instagram"></i></a>
            <a href="mailto:haya24si@mahasiswa.pcr.ac.id" class="text-danger">
    <i class="bi bi-envelope-fill"></i>
</a>

        </div>
        <hr>
        <p class="text-muted-custom">
    Website SIBANSOS dikembangkan sebagai bagian dari pemenuhan tugas Project Mata Kuliah Pemrograman Framework.
    Sistem ini dibangun menggunakan framework Laravel.
</p>

    </div>
</div>

<style>
.profile-card {
    max-width: 500px;
    padding: 30px;
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}
.profile-card img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
}
.text-muted-custom { color: #6c757d; }
.social-icons a { font-size:1.5rem; margin:0 10px; transition: transform 0.3s; }
.social-icons a:hover { transform: scale(1.2); }
</style>
@endsection
