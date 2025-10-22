@extends('guest.layouts.main')

@section('content')
<section id="hero" class="d-flex align-items-center"
    style="background: linear-gradient(to bottom right, #f6fffa, #eaf8f3); min-height: 80vh;">
    <div class="container text-center" data-aos="fade-up">

        <div class="card mx-auto shadow"
            style="max-width: 700px; background: #007a66; color: white; border-radius: 16px;">
            <div class="card-body p-5">
                <span class="badge bg-light text-success mb-3 px-3 py-2" style="font-size: 0.9rem;">
                    Program Bantuan Sosial
                </span>

                <h2 class="card-title fw-bold mb-3">
                    Dukung Kesejahteraan Warga Melalui Program Bantuan Sosial Dan Penerima Manfaat
                </h2>

                <p class="text-light mb-4" style="line-height: 1.6;">
                    Bina Desa berkomitmen menyalurkan bantuan secara transparan dan tepat sasaran.
                    Mulai dari pendaftaran penerima manfaat, verifikasi lapangan, hingga penyaluran bantuan –
                    semuanya dapat dilakukan secara digital dan efisien.
                </p>

                <a href="{{ route('guest.program_bantuan.index') }}"
                    class="btn btn-light text-success fw-semibold px-4 py-2 rounded-pill shadow-sm">
                    Program Bantuan
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
