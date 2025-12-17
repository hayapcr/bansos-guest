<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center dark-background">
        <div class="container d-flex justify-content-center justify-content-md-between">

            {{-- KONTAK --}}
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="mailto:contact@example.com">contact@example.com</a>
                </i>

                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+1 5589 55488 55</span>
                </i>
            </div>

            {{-- DROPDOWN USER --}}
            @auth
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">

                    {{-- FOTO PROFIL (AUTO GENERATE) --}}
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff"
                         alt="profile" class="rounded-circle me-2" width="35" height="35">

                    <span>{{ Auth::user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li class="dropdown-header fw-bold text-center">
                        {{ Auth::user()->name }}
                        <br>
                        <small class="text-muted">{{ ucfirst(Auth::user()->role) }}</small>
                    </li>

                    <hr class="dropdown-divider">

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-person-circle me-2"></i> My Profile
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-envelope me-2"></i> Messages
                    </a></li>

                    {{-- Waktu (hanya tampilan visual) --}}
                    <li>
                        <a class="dropdown-item disabled text-muted">
                            <i class="bi bi-clock me-2"></i> {{ now()->format('Y-m-d H:i:s') }}
                        </a>
                    </li>

                    <hr class="dropdown-divider">

                    <li>
                        <a class="dropdown-item text-danger"
                           href="{{ route('auth.logout') }}"
                           onclick="return confirm('Yakin ingin logout?')">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>

                </ul>
            </div>
            @endauth

        </div>
    </div>

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            {{-- LOGO --}}
            <a href="{{ route('dashboard') }}"
               class="logo d-flex align-items-center text-decoration-none">
                <h1 class="sitename text-success fw-bold">BinaDesa</h1>
            </a>

            {{-- NAVIGASI --}}
            <nav id="navmenu" class="navmenu">
                <ul>

                    {{-- MENU UMUM --}}
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                    {{-- MENU GUEST --}}
                    @if(Auth::check() && Auth::user()->role == 'guest')
                        <li><a href="{{ route('guest.program_bantuan.index') }}">Program Bantuan</a></li>
                        <li><a href="{{ route('guest.warga.index') }}">Data Warga</a></li>
                    @endif

                    {{-- MENU ADMIN --}}
                    @if(Auth::check() && Auth::user()->role == 'admin')
                        <li><a href="{{ route('admin.program_bantuan.index') }}">Kelola Bantuan</a></li>
                        <li><a href="{{ route('admin.warga.index') }}">Kelola Data Warga</a></li>
                        <li><a href="{{ route('admin.user.index') }}">Kelola User</a></li>
                    @endif

                    {{-- MENU KEPALA DESA --}}
                    @if(Auth::check() && Auth::user()->role == 'kades')
                        <li><a href="{{ route('kades.laporan.index') }}">Laporan Bantuan</a></li>
                        <li><a href="{{ route('kades.verifikasi.index') }}">Verifikasi Warga</a></li>
                        <li><a href="{{ route('kades.pengumuman.index') }}">Pengumuman Desa</a></li>
                    @endif

                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>
</header>
