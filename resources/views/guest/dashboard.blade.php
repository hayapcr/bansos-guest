@extends('guest.layouts.main')

@section('content')
<section id="hero" class="d-flex align-items-center"
    style="
        background: linear-gradient(rgba(246,255,250,0.7), rgba(234,248,243,0.7)),
                    url('{{ asset('assets-guest/img/hero-bg.jpg') }}') no-repeat center center;
        background-size: cover;
        min-height: 80vh;
    ">
    <div class="container text-center" data-aos="fade-up">

        <!-- CARD UTAMA -->
        <div class="card mx-auto shadow"
            style="max-width: 850px; background: #007a66; color: white; border-radius: 20px;">
            <div class="card-body p-5">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="d-inline-block mb-4">
                    <img src="{{ asset('assets-guest/img/sibansos3.png') }}"
                         alt="Logo BinaDesa"
                         class="login-logo img-fluid"
                         style="max-height: 150px;">
                </a>

                <!-- JUDUL -->
                <h2 class="fw-bold mb-3">
                    Membangun Desa yang Sejahtera
                </h2>

                <!-- DESKRIPSI -->
                <p class="text-light mb-4" style="line-height: 1.7;">
                    Menyalurkan bantuan sosial dengan transparan, efisien, dan tepat sasaran.
                    Jelajahi data program bantuan dan penerima manfaat di desa Anda.
                </p>

                <!-- BUTTON GRID -->
                <div class="row g-3 justify-content-center mt-4">

                    @php
                        $buttons = [
                            ['route' => 'guest.program_bantuan.index', 'icon' => 'bi-gift', 'text' => 'Program Bantuan'],
                            ['route' => 'guest.warga.index', 'icon' => 'bi-people', 'text' => 'Data Warga'],
                            ['route' => 'guest.user.index', 'icon' => 'bi-person-badge', 'text' => 'Data User'],
                            ['route' => 'guest.pendaftar_bantuan.index', 'icon' => 'bi-file-earmark-text', 'text' => 'Pendaftar Bantuan'],
                            ['route' => 'guest.verifikasi_lapangan.index', 'icon' => 'bi-clipboard-data', 'text' => 'Verifikasi Lapangan'],
                            ['route' => 'guest.penerima_bantuan.index', 'icon' => 'bi-person-check', 'text' => 'Penerima Bantuan'],
                            ['route' => 'guest.riwayat_penyaluran.index', 'icon' => 'bi-clock-history', 'text' => 'Riwayat Penyaluran'],
                        ];
                    @endphp

                    @foreach ($buttons as $btn)
                    <div class="col-md-4 col-6">
                        <a href="{{ route($btn['route']) }}"
                           class="btn btn-outline-light w-100 fw-semibold py-2 rounded-pill shadow-sm"
                           style="transition: all 0.3s;">
                           <i class="bi {{ $btn['icon'] }}"></i> {{ $btn['text'] }}
                        </a>
                    </div>
                    @endforeach

                </div> <!-- end row -->

            </div>
        </div>
    </div>
</section>

<style>
/* Hover efek tombol */
.btn:hover {
    background-color: rgba(255,255,255,0.2);
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 768px) {
    .login-logo {
        max-height: 100px;
    }
}
</style>
@endsection
