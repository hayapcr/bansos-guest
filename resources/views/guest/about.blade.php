@extends('guest.layouts.main')

@section('content')
    <section class="about-hero py-5" style="background-color: #f2fbf7;">
        <div class="container text-center">

            {{-- ================= SLIDESHOW ================= --}}
            <div id="aboutCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000"
                data-bs-pause="false">

                <div class="carousel-inner rounded-4 shadow">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets-guest/img/slide1.1.jpg') }}" class="d-block w-100 rounded-4"
                            alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets-guest/img/slide2.png') }}" class="d-block w-100 rounded-4"
                            alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets-guest/img/slide3.1.jpeg') }}" class="d-block w-100 rounded-4"
                            alt="Slide 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{-- ================= END SLIDESHOW ================= --}}

            {{-- ================= JUDUL & DESKRIPSI ================= --}}
            <div class="mb-5">
                <h2 class="fw-bold text-success">
                    Tentang <span class="text-dark">SIBANSOS</span>
                </h2>

                <p class="text-muted mt-3 fs-5">
                    <strong>SIBANSOS (Sistem Informasi Bantuan Sosial)</strong> adalah platform digital desa
                    yang dirancang untuk mengelola, menampilkan, dan memantau seluruh
                    <span class="text-success fw-semibold">program bantuan sosial</span>
                    secara terstruktur dan transparan.
                </p>

                <p class="text-muted fs-5">
                    Melalui SIBANSOS, masyarakat dapat mengetahui informasi
                    <span class="text-warning fw-semibold">jenis bantuan</span>,
                    <span class="text-warning fw-semibold">penerima manfaat</span>,
                    <span class="text-warning fw-semibold">tahapan penyaluran</span>,
                    hingga <span class="text-warning fw-semibold">bukti realisasi bantuan</span>
                    secara terbuka dan akuntabel.
                </p>
            </div>


            {{-- ================= 3 CARD KONTEN ================= --}}
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white">
                        <div class="icon-circle">🎯</div>
                        <h5 class="fw-bold text-success mb-2">Misi Kami</h5>
                        <p class="text-muted mb-0">
                            Meningkatkan akses informasi program bantuan secara terbuka dan terpercaya.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white">
                        <div class="icon-circle">🤝</div>
                        <h5 class="fw-bold text-success mb-2">Kolaborasi</h5>
                        <p class="text-muted mb-0">
                            Menjalin sinergi antara pemerintah desa, warga, dan lembaga sosial.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white">
                        <div class="icon-circle">🔍</div>
                        <h5 class="fw-bold text-success mb-2">Transparansi</h5>
                        <p class="text-muted mb-0">
                            Data program disajikan secara akurat dan dapat diakses publik.
                        </p>
                    </div>
                </div>
            </div>

            {{-- ================= VISI ================= --}}
            <div class="mt-5">
                <div class="card border-0 shadow-lg rounded-4 p-5 mx-auto bg-white" style="max-width: 800px;">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="icon-circle me-3">💡</div>
                        <h4 class="fw-bold text-success mb-0">Visi Kami</h4>
                    </div>
                    <p class="text-muted fs-5 text-center">
                        Menjadi wadah digital yang mendorong desa di Indonesia menuju transformasi sosial dan ekonomi
                        yang berkeadilan, berdaya saing serta transparan melalui teknologi informasi.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .icon-circle {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #0a8f6c, #14c38e);
            color: white;
            border-radius: 50%;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.3);
        }

        .hover-scale:hover {
            transform: translateY(-12px);
            box-shadow: 0 28px 60px rgba(0, 0, 0, 0.4);
        }

        .carousel .carousel-control-prev-icon,
        .carousel .carousel-control-next-icon {
            background-size: 100%, 100%;
        }

        .carousel-inner img {
            max-height: 400px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .icon-circle {
                width: 58px;
                height: 58px;
                font-size: 1.6rem;
            }
        }
    </style>
@endsection
