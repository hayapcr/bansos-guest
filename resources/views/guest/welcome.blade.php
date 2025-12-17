@extends('guest.layouts.main')

@section('content')
<section id="hero" class="d-flex align-items-center"
    style="background: linear-gradient(to bottom right, #f6fffa, #eaf8f3); min-height: 80vh;">
    <div class="container text-center" data-aos="fade-up">

        <div class="card mx-auto shadow"
            style="max-width: 850px; background: #007a66; color: white; border-radius: 20px;">
            <div class="card-body p-5">

                <!-- LOGO -->
                <a href="{{ route('home') }}" class="d-inline-block mb-4">
                    <img src="{{ asset('assets-guest/img/sibansos3.png') }}"
                         alt="Logo BinaDesa"
                         class="login-logo img-fluid"
                         style="max-height: 150px;">
                </a>

                <!-- JUDUL -->
                <h2 class="fw-bold mb-3">Membangun Desa yang Sejahtera</h2>

                <!-- DESKRIPSI -->
                <p class="text-light mb-4" style="line-height: 1.7;">
                    Menyalurkan bantuan sosial dengan transparan, efisien, dan tepat sasaran.
                    Jelajahi data program bantuan dan penerima manfaat di desa Anda.
                </p>

                <!-- BUTTON LOGIN -->
                <div class="mt-4 text-center">
                    <a href="{{ route('auth.index') }}"
                       class="btn btn-light fw-semibold py-2 px-4 rounded-pill shadow-sm"
                       style="transition: all 0.3s;">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.btn:hover {
    background-color: rgba(255,255,255,0.2);
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.login-logo {
    max-height: 150px;
}
@media (max-width: 768px) {
    .login-logo {
        max-height: 100px;
    }
}
</style>
@endsection
