@extends('guest.layouts.main')

@section('content')
    <section id="hero" class="d-flex align-items-center"
        style="background: linear-gradient(to bottom right, #f6fffa, #eaf8f3); min-height: 80vh;">
        <div class="container text-center" data-aos="fade-up">
            <div class="card mx-auto shadow"
                style="max-width: 800px; background: #007a66; color: white; border-radius: 20px;">
                <div class="card-body p-5">
                    <span class="badge bg-light text-success mb-3 px-3 py-2" style="font-size: 0.9rem;">
                        <i class="bi bi-tree"></i> BinaDesa
                    </span>

                    <h2 class="fw-bold mb-3">
                        Bersama <span class="text-warning">BinaDesa</span> Membangun Desa yang Sejahtera
                    </h2>

                    <p class="text-light mb-4" style="line-height: 1.7;">
                        Menyalurkan bantuan sosial dengan transparan, efisien, dan tepat sasaran.
                        Jelajahi data program bantuan dan penerima manfaat di desa Anda.
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('guest.program_bantuan.index') }}"
                            class="btn btn-light text-success fw-semibold px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-gift"></i> Program Bantuan
                        </a>
                        <a href="{{ route('guest.warga.index') }}"
                            class="btn btn-outline-light fw-semibold px-4 py-2 rounded-pill">
                            <i class="bi bi-people"></i> Data Warga
                        </a>

                        <a href="{{ route('guest.user.index') }}"
                            class="btn btn-outline-light fw-semibold px-4 py-2 rounded-pill">
                            <i class="bi bi-person-badge"></i> Data User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
