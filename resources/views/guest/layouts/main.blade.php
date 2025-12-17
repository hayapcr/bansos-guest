<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinaDesa</title>

    {{-- CSS --}}
    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    <style>
        /* ================= ANTI SCROLL SAMPING ================= */
        html,
        body {
            width: 100%;
            overflow-x: hidden;
        }

        /* ================= TOPBAR ================= */
        .topbar .contact-info {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 14px;
        }

        .topbar .contact-info i {
            margin-right: 6px;
        }

        .topbar a {
            color: #fff;
            text-decoration: none;
        }

        /* ================= HEADER ================= */
        .header {
            background: #fff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
            transition: all .3s ease;
        }

        .header .branding {
            min-height: 120px;
            padding: 12px 0;
        }

        /* ================= LOGO ================= */
        .logo-img {
            height: 110px !important;
            max-height: none !important;
            width: auto !important;
            display: block;
            object-fit: contain;
            transition: transform .3s ease;
        }

        .logo-img:hover {
            transform: scale(1.03);
        }

        /* ================= NAVBAR ================= */
        #navmenu ul {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 0;
            padding: 0;
            list-style: none;
            flex-wrap: nowrap;
        }

        #navmenu li {
            position: relative;
        }

        #navmenu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 6px 8px;
            white-space: nowrap;
            position: relative;
            transition: color .3s ease;
        }

        #navmenu a:hover {
            color: #0a8f6c;
        }

        /* Underline animasi */
        #navmenu a::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: #0a8f6c;
            transition: all .3s ease;
            transform: translateX(-50%);
        }

        #navmenu a:hover::after {
            width: 70%;
        }

        /* ================= DROPDOWN ================= */
        .dropdown-menu-vertical {
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 260px;
            padding: 8px 0;
            margin: 0;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .15);
            display: none;
            flex-direction: column;
            list-style: none;
            z-index: 999;

            /* animasi */
            opacity: 0;
            transform: translateY(10px);
            transition: all .25s ease;
        }

        #navmenu li.dropdown.show>.dropdown-menu-vertical,
        #navmenu li.dropdown:hover>.dropdown-menu-vertical {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu-vertical li {
            width: 100%;
        }

        .dropdown-menu-vertical li a {
            display: block;
            padding: 10px 18px;
            font-weight: 500;
            color: #0a8f6c;
            white-space: nowrap;
            border-radius: 8px;
            transition: background .2s ease, padding-left .2s ease;
        }

        .dropdown-menu-vertical li a:hover {
            background: #f2fbf7;
            padding-left: 24px;
        }

        /* ================= CARET ================= */
        .caret {
            font-size: 11px;
            margin-left: 4px;
            transition: transform .3s ease;
        }

        #navmenu li.dropdown.show>a .caret,
        #navmenu li.dropdown:hover>a .caret {
            transform: rotate(180deg);
        }

        /* ================= USER ================= */
        .dropdown-toggle img {
            transition: transform .3s ease;
        }

        .dropdown-toggle:hover img {
            transform: scale(1.08);
        }

        .dropdown-menu {
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .15);
            animation: fadeUser .25s ease;
        }

        @keyframes fadeUser {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ================= MAIN ================= */
        main.main {
            width: 100%;
            overflow-x: hidden;
        }

        /* ================= WHATSAPP ================= */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background: #25D366;
            color: #fff;
            border-radius: 50%;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
            z-index: 999;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, .6);
            }

            70% {
                box-shadow: 0 0 0 18px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* ================= FULL PAGE BACKGROUND HERO ================= */
        .page-bg {
            min-height: 100vh;
            /* FULL SATU HALAMAN */
            width: 100%;
            background: #f2fbf7;
            /* WARNA YANG DIMINTA */
            display: flex;
            align-items: center;
        }

        /* supaya konten tidak nempel header */
        .page-bg .container {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* tinggi header (topbar + branding) */
        :root {
            --header-height: 170px;
            /* SUDAH DISESUAIKAN DENGAN KODEMU */
        }

        /* main hanya ambil sisa layar */
        main.page-bg {
            min-height: calc(100vh - var(--header-height));
            display: flex;
            align-items: center;
            /* TENGAH VERTIKAL */
            justify-content: center;
            /* TENGAH HORIZONTAL */
            background: #f2fbf7;
        }

        /* container jangan nambah tinggi */
        main.page-bg .container {
            padding: 0;
        }

        /* ================= FOOTER ================= */
        .footer {
            background: linear-gradient(135deg, #0a8f6c, #0d6f55);
            color: #eafff6;
            padding: 50px 0 25px;
        }

        .footer-logo {
            height: 70px;
            margin-bottom: 15px;
        }

        .footer h6 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.7;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 8px;
        }

        .footer ul li a {
            color: #d8fff1;
            font-size: 14px;
            text-decoration: none;
            transition: .3s;
        }

        .footer ul li a:hover {
            color: #ffffff;
            padding-left: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 30px;
            padding-top: 15px;
            font-size: 13px;
            text-align: center;
            color: #ccf5e8;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">
        {{-- TOPBAR --}}
        <div class="topbar d-flex align-items-center dark-background">
            <div class="container">
                <div class="contact-info">
                    <div><i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">sibansos@gmail.com</a>
                    </div>
                    <div><i class="bi bi-phone"></i> <span>+1 5589 55488 55</span></div>
                </div>
            </div>
        </div>

        {{-- BRANDING --}}
        <div class="branding d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('assets-guest/img/logoweb.png') }}" class="logo-img">
                </a>

                <div class="d-flex align-items-center gap-4">
                    {{-- NAV --}}
                    <nav id="navmenu">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>

                            <li class="dropdown">
                                <a href="#">Tentang Kami <i class="bi bi-chevron-down caret"></i></a>
                                <ul class="dropdown-menu-vertical">
                                    <li><a href="{{ route('guest.about') }}">About</a></li>
                                    <li><a href="{{ route('guest.layanan') }}">Layanan</a></li>
                                    <li><a href="{{ route('guest.kontak') }}">Kontak</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#">Publikasi <i class="bi bi-chevron-down caret"></i></a>
                                <ul class="dropdown-menu-vertical">
                                    <li><a href="{{ route('guest.program_bantuan.index') }}">Program Bantuan</a></li>
                                    <li><a href="{{ route('guest.warga.index') }}">Data Warga</a></li>
                                    <li><a href="{{ route('guest.user.index') }}">Data User</a></li>
                                    <li><a href="{{ route('guest.pendaftar_bantuan.index') }}">Pendaftar Bantuan</a>
                                    </li>
                                    <li><a href="{{ route('guest.verifikasi_lapangan.index') }}">Verifikasi
                                            Lapangan</a></li>
                                    <li><a href="{{ route('guest.penerima_bantuan.index') }}">Penerima Bantuan</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('guest.riwayat_penyaluran.index') }}">Riwayat Penyaluran Bantuan</a>
                            </li>
                        </ul>
                    </nav>

                    {{-- USER --}}
                    {{-- USER --}}
                    @auth
<div class="dropdown">
    <a href="#" class="d-flex align-items-center dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=40&d=identicon"
     class="rounded-circle me-2" width="36" alt="Avatar">

        <span class="fw-semibold">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end border-0">
        <li class="p-3 border-bottom">
            <strong>{{ Auth::user()->name }}</strong><br>
            <small>Login: {{ session('login_time') }}</small>
        </li>
        <li><a class="dropdown-item" href="{{ route('guest.my_profile') }}">Developer</a></li>

        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item text-danger fw-semibold" href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
@endauth


                    @guest
                        <div>
                            <a href="{{ route('auth.index') }}" class="btn btn-success btn-sm">Login</a>
                        </div>
                    @endguest


                </div>
            </div>
        </div>
    </header>

    <main class="main page-bg">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
        <i class="bi bi-whatsapp fs-3"></i>
    </a>

    <footer class="footer">
        <div class="container">
            <div class="row gy-4">

                <div class="col-md-5">
                    <img src="{{ asset('assets-guest/img/logoweb.png') }}" class="footer-logo">
                    <p>
                        Sistem informasi pelayanan desa yang dirancang untuk mendukung
                        transparansi, efisiensi, dan ketepatan penyaluran bantuan sosial
                        kepada masyarakat.
                    </p>
                </div>

                <div class="col-md-3">
                    <h6>Menu</h6>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li><a href="{{ route('guest.about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('guest.layanan') }}">Layanan</a></li>
                        <li><a href="{{ route('guest.kontak') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h6>Kontak</h6>
                    <ul>
                        <li><i class="bi bi-envelope me-2"></i> sibansos@gmail.com</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 812 3456 7890</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Kantor Desa Indonesia</li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                © {{ date('Y') }} Sistem Informasi Pelayanan Desa • All Rights Reserved
            </div>
        </div>
    </footer>


    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
