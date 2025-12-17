@extends('guest.layouts.main')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <!-- 🔹 Judul -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success d-inline-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#198754" viewBox="0 0 16 16" class="me-2">
                    <path d="M9.605.112a.5.5 0 0 0-.493.093L8 1.293 7.107.205A.5.5 0 0 0 6.395.112l-.708.706a.5.5 0 0 0-.12.51l.423 1.27a4.992 4.992 0 0 0-.98.568l-1.27-.423a.5.5 0 0 0-.51.12l-.706.708a.5.5 0 0 0-.093.493l.412 1.23a5.04 5.04 0 0 0-.46.982l-1.23-.412a.5.5 0 0 0-.493.093l-.708.706a.5.5 0 0 0-.12.51l.423 1.27a4.992 4.992 0 0 0-.568.98l-1.27-.423a.5.5 0 0 0-.51.12l-.706.708a.5.5 0 0 0-.093.493l.205.899.112.496a.5.5 0 0 0 .493.392H1.293L.205 7.893a.5.5 0 0 0-.093.493l.706.708a.5.5 0 0 0 .51.12l1.27-.423a4.992 4.992 0 0 0 .568.98l-.423 1.27a.5.5 0 0 0 .12.51l.708.706a.5.5 0 0 0 .493.093l1.23-.412a5.04 5.04 0 0 0 .982.46l-.412 1.23a.5.5 0 0 0 .093.493l.706.708a.5.5 0 0 0 .51.12l1.27-.423a4.992 4.992 0 0 0 .98.568l-.423 1.27a.5.5 0 0 0 .12.51l.708.706a.5.5 0 0 0 .493.093l.899-.205.496-.112a.5.5 0 0 0 .392-.493V14.707l1.088 1.088a.5.5 0 0 0 .493.093l.708-.706a.5.5 0 0 0 .12-.51l-.423-1.27a4.992 4.992 0 0 0 .568-.98l1.27.423a.5.5 0 0 0 .51-.12l.706-.708a.5.5 0 0 0 .093-.493l-.412-1.23a5.04 5.04 0 0 0 .46-.982l1.23.412a.5.5 0 0 0 .493-.093l.708-.706a.5.5 0 0 0 .12-.51l-.423-1.27a4.992 4.992 0 0 0 .568-.98l1.27.423a.5.5 0 0 0 .51-.12l.706-.708a.5.5 0 0 0 .093-.493l-.205-.899-.112-.496a.5.5 0 0 0-.493-.392H14.707L15.795 8.107a.5.5 0 0 0 .093-.493l-.706-.708a.5.5 0 0 0-.51-.12l-1.27.423a4.992 4.992 0 0 0-.568-.98l.423-1.27a.5.5 0 0 0-.12-.51l-.708-.706a.5.5 0 0 0-.493-.093l-1.23.412a5.04 5.04 0 0 0-.982-.46l.412-1.23a.5.5 0 0 0-.093-.493L9.605.112ZM8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z"/>
                </svg>
                Layanan BinaDesa
            </h2>
            <p class="text-muted mt-3">Berbagai layanan yang siap membantu warga desa dalam pendaftaran, pendataan, dan informasi program sosial secara digital dan cepat.</p>
        </div>

        <!-- 🔹 Kartu Layanan -->
        <div class="row g-4">
            <!-- Layanan 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 service-card text-center p-4">
                    <div class="icon-wrapper bg-success bg-opacity-10 text-success mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708L7.707 11l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0z"/>
                            <path d="M4.5 3A.5.5 0 0 1 5 3.5v9a.5.5 0 0 1-1 0v-9A.5.5 0 0 1 4.5 3z"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold mb-2">Pendaftaran Online</h5>
                    <p class="text-muted small">Daftarkan diri atau keluarga untuk mengikuti program bantuan sosial langsung dari rumah.</p>
                </div>
            </div>

            <!-- Layanan 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 service-card text-center p-4">
                    <div class="icon-wrapper bg-success bg-opacity-10 text-success mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 0h1v16H0V0zm15 0h1v16h-1V0zM3 2h10v12H3V2zm2 2v8h6V4H5z"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold mb-2">Data Penerima Bantuan</h5>
                    <p class="text-muted small">Lihat dan cek data warga penerima bantuan dengan mudah dan transparan.</p>
                </div>
            </div>

            <!-- Layanan 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0 service-card text-center p-4">
                    <div class="icon-wrapper bg-success bg-opacity-10 text-success mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.058.352.176.288.469l-.738 3.468c-.194.894.105 1.319.808 1.319.545 0 .979-.252 1.27-.598l.088-.416c-.23.252-.553.372-.832.372-.305 0-.45-.176-.388-.486l.738-3.468c.194-.894-.105-1.319-.808-1.319a1.623 1.623 0 0 0-.962.333l.082-.38 2.29-.287zM8 4.5a.905.905 0 1 1 0 1.81.905.905 0 0 1 0-1.81z"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold mb-2">Informasi & Pengumuman</h5>
                    <p class="text-muted small">Dapatkan update terbaru tentang jadwal, pendaftaran, dan hasil seleksi program bantuan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🎨 Styling tambahan -->
<style>
/* ================= SECTION ================= */
section.bg-light {
    background: linear-gradient(180deg, #f8fdfb, #eef8f4);
}

/* ================= ICON ================= */
.icon-wrapper {
    width: 76px;
    height: 76px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;

    background: linear-gradient(135deg, #0a8f6c, #18c39e);
    color: #fff;

    transition: all 0.35s ease;
    box-shadow: 0 10px 22px rgba(10, 143, 108, 0.35);
}

/* ================= CARD ================= */
.service-card {
    border-radius: 22px;
    transition: all 0.35s ease;
    position: relative;
    overflow: hidden;
}

/* garis aksen atas */
.service-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 5px;
    width: 100%;
    background: linear-gradient(90deg, #0a8f6c, #18c39e);
}

/* hover efek */
.service-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 22px 45px rgba(0, 0, 0, 0.15);
}

/* icon animasi */
.service-card:hover .icon-wrapper {
    transform: scale(1.12) rotate(5deg);
    box-shadow: 0 14px 30px rgba(10, 143, 108, 0.5);
}

/* ================= JUDUL ================= */
.service-card h5 {
    margin-top: 12px;
    font-size: 1.15rem;
    color: #0a8f6c;
}

/* ================= DESKRIPSI ================= */
.service-card p {
    font-size: 0.95rem;
    line-height: 1.7;
}

/* ================= JUDUL SECTION ================= */
section h2 {
    font-size: 2.4rem;
}

section p.text-muted {
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    font-size: 1.05rem;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    section h2 {
        font-size: 2rem;
    }
}
</style>

@endsection
