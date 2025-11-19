    @extends('guest.layouts.main')

    @section('content')
    <section class="about-hero d-flex align-items-center">
        <div class="container text-center text-white">

            {{-- Judul & Deskripsi --}}
            <div class="mb-5">
                <h2 class="fw-bold text-success">Tentang <span class="text-light">BinaDesa</span></h2>
                <p class="text-white mt-3 fs-5">
                    <strong>BinaDesa</strong> adalah platform digital untuk informasi dan pendataan
                    <span class="text-warning">program bantuan sosial di desa</span>.
                    Kami menghadirkan transparansi dan keterbukaan informasi bagi seluruh warga.
                </p>
            </div>

            {{-- 3 Kartu Konten --}}
            <div class="row justify-content-center g-4">
                {{-- Misi Kami --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white bg-opacity-75 hover-scale">
                        <div class="icon-circle">🎯</div>
                        <h5 class="fw-bold text-success mb-2">Misi Kami</h5>
                        <p class="text-muted mb-0">
                            Meningkatkan akses informasi program bantuan secara terbuka dan terpercaya.
                        </p>
                    </div>
                </div>

                {{-- Kolaborasi --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white bg-opacity-75 hover-scale">
                        <div class="icon-circle">🤝</div>
                        <h5 class="fw-bold text-success mb-2">Kolaborasi</h5>
                        <p class="text-muted mb-0">
                            Menjalin sinergi antara pemerintah desa, warga, dan lembaga sosial.
                        </p>
                    </div>
                </div>

                {{-- Transparansi --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white bg-opacity-75 hover-scale">
                        <div class="icon-circle">🔍</div>
                        <h5 class="fw-bold text-success mb-2">Transparansi</h5>
                        <p class="text-muted mb-0">
                            Data program disajikan secara akurat dan dapat diakses publik.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Bagian Visi --}}
            <div class="mt-5">
                <div class="card border-0 shadow-lg rounded-4 p-5 bg-white bg-opacity-75 mx-auto" style="max-width: 800px;">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="icon-circle me-3">💡</div>
                        <h4 class="fw-bold text-success mb-0">Visi Kami</h4>
                    </div>
                    <p class="text-muted fs-5">
                        Menjadi wadah digital yang mendorong desa di Indonesia menuju transformasi sosial dan ekonomi
                        yang berkeadilan, berdaya saing serta transparan melalui teknologi informasi.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- STYLE --}}
    <style>
    .about-hero {
        background-image: url('{{ asset("assets-guest/img/bg-bansos.jpg") }}');
        background-size: cover;        /* Gambar penuh layar */
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;            /* Full 1 layar */
        height: 100vh;                /* Paksa full tinggi */
        width: 100%;
        padding: 0;
        margin: 0;
        position: relative;
        display: flex;
        align-items: center;
    }

    /* Overlay full-screen */
    .about-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1;
    }

    .about-hero .container {
        position: relative;
        z-index: 2;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    /* Kotak icon */
    .icon-circle {
        width: 70px;
        height: 70px;
        background: #007a66;
        color: white;
        border-radius: 50%;
        font-size: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    /* Efek hover */
    .hover-scale {
        transition: 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
    }
    </style>
    @endsection
