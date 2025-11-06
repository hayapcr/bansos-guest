@extends('guest.layouts.main')

@section('content')
<section class="py-5 about-section d-flex align-items-center">
    <div class="container text-center text-white">
        {{-- Judul & Deskripsi --}}
        <div class="mb-5">
            <h2 class="fw-bold text-success">Tentang <span class="text-dark">BinaDesa</span></h2>
            <p class="text-muted mt-3 fs-5">
                <strong>BinaDesa</strong> adalah platform digital untuk informasi dan pendataan
                <span class="text-success">program bantuan sosial di desa</span>.
                Kami berkomitmen untuk menghadirkan transparansi, kemudahan, dan keterbukaan informasi bagi seluruh warga.
            </p>
        </div>

        {{-- 3 Kartu Konten --}}
        <div class="row justify-content-center g-4">
            {{-- Misi Kami --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-scale">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width:70px;height:70px;font-size:2rem;">🎯</div>
                    <h5 class="fw-bold text-success mb-2">Misi Kami</h5>
                    <p class="text-muted mb-0">
                        Meningkatkan akses informasi program bantuan secara terbuka dan terpercaya.
                    </p>
                </div>
            </div>

            {{-- Kolaborasi --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-scale">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width:70px;height:70px;font-size:2rem;">🤝</div>
                    <h5 class="fw-bold text-success mb-2">Kolaborasi</h5>
                    <p class="text-muted mb-0">
                        Menjalin sinergi antara pemerintah desa, warga, dan lembaga sosial untuk kemajuan bersama.
                    </p>
                </div>
            </div>

            {{-- Transparansi --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-scale">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width:70px;height:70px;font-size:2rem;">🔍</div>
                    <h5 class="fw-bold text-success mb-2">Transparansi</h5>
                    <p class="text-muted mb-0">
                        Setiap program dapat diakses publik dengan data yang akurat dan terpercaya.
                    </p>
                </div>
            </div>
        </div>

        {{-- Bagian Visi --}}
        <div class="mt-5">
            <div class="card border-0 shadow-sm rounded-4 p-5 mx-auto" style="max-width: 800px;">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                         style="width:70px;height:70px;font-size:2rem;">💡</div>
                    <h4 class="fw-bold text-success mb-0">Visi Kami</h4>
                </div>
                <p class="text-muted fs-5">
                    Menjadi wadah digital yang mendorong desa-desa di Indonesia menuju transformasi sosial dan ekonomi
                    yang berkeadilan, berdaya saing, serta transparan melalui teknologi informasi.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
/* 🌄 Full background di seluruh layar */
.about-section {
    background-image: url('{{ asset("assets-guest/img/bg-bansos.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    min-height: 50vh; /* 🔹 Menutupi seluruh tinggi layar */
}

/* 🔲 Overlay agar teks tetap terbaca */
.about-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.85); /* lapisan putih transparan */
    z-index: 1;
}

/* Pastikan konten di atas overlay */
.about-section .container {
    position: relative;
    z-index: 2;
}

/* Efek hover card */
.hover-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-scale:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(0, 122, 102, 0.15);
}

.icon-wrapper {
    flex-shrink: 0;
}
</style>
@endsection
