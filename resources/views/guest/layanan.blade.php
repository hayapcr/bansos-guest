@extends('guest.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <!-- 🔧 Judul dengan ikon manual -->
            <h2 class="d-flex align-items-center">
                <!-- SVG Icon Gear -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#198754" viewBox="0 0 16 16" class="me-2">
                    <path d="M9.605.112a.5.5 0 0 0-.493.093L8 1.293 7.107.205A.5.5 0 0 0 6.395.112l-.708.706a.5.5 0 0 0-.12.51l.423 1.27a4.992 4.992 0 0 0-.98.568l-1.27-.423a.5.5 0 0 0-.51.12l-.706.708a.5.5 0 0 0-.093.493l.412 1.23a5.04 5.04 0 0 0-.46.982l-1.23-.412a.5.5 0 0 0-.493.093l-.708.706a.5.5 0 0 0-.12.51l.423 1.27a4.992 4.992 0 0 0-.568.98l-1.27-.423a.5.5 0 0 0-.51.12l-.706.708a.5.5 0 0 0-.093.493l.205.899.112.496a.5.5 0 0 0 .493.392H1.293L.205 7.893a.5.5 0 0 0-.093.493l.706.708a.5.5 0 0 0 .51.12l1.27-.423a4.992 4.992 0 0 0 .568.98l-.423 1.27a.5.5 0 0 0 .12.51l.708.706a.5.5 0 0 0 .493.093l1.23-.412a5.04 5.04 0 0 0 .982.46l-.412 1.23a.5.5 0 0 0 .093.493l.706.708a.5.5 0 0 0 .51.12l1.27-.423a4.992 4.992 0 0 0 .98.568l-.423 1.27a.5.5 0 0 0 .12.51l.708.706a.5.5 0 0 0 .493.093l.899-.205.496-.112a.5.5 0 0 0 .392-.493V14.707l1.088 1.088a.5.5 0 0 0 .493.093l.708-.706a.5.5 0 0 0 .12-.51l-.423-1.27a4.992 4.992 0 0 0 .568-.98l1.27.423a.5.5 0 0 0 .51-.12l.706-.708a.5.5 0 0 0 .093-.493l-.412-1.23a5.04 5.04 0 0 0 .46-.982l1.23.412a.5.5 0 0 0 .493-.093l.708-.706a.5.5 0 0 0 .12-.51l-.423-1.27a4.992 4.992 0 0 0 .568-.98l1.27.423a.5.5 0 0 0 .51-.12l.706-.708a.5.5 0 0 0 .093-.493l-.205-.899-.112-.496a.5.5 0 0 0-.493-.392H14.707L15.795 8.107a.5.5 0 0 0 .093-.493l-.706-.708a.5.5 0 0 0-.51-.12l-1.27.423a4.992 4.992 0 0 0-.568-.98l.423-1.27a.5.5 0 0 0-.12-.51l-.708-.706a.5.5 0 0 0-.493-.093l-1.23.412a5.04 5.04 0 0 0-.982-.46l.412-1.23a.5.5 0 0 0-.093-.493L9.605.112ZM8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z"/>
                </svg>
                Layanan BinaDesa
            </h2>
            <p class="text-muted">BinaDesa menyediakan berbagai layanan untuk membantu warga desa dalam proses pendaftaran dan pendataan program bantuan sosial.</p>
        </div>

        <!-- ✅ Daftar Layanan -->
        <ul class="list-group shadow-sm rounded-3">
            <li class="list-group-item d-flex align-items-center">
                <!-- SVG Icon Daftar -->
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#198754" viewBox="0 0 16 16" class="me-3">
                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708L7.707 11l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0z"/>
                    <path d="M4.5 3A.5.5 0 0 1 5 3.5v9a.5.5 0 0 1-1 0v-9A.5.5 0 0 1 4.5 3z"/>
                </svg>
                Pendaftaran program bantuan secara online.
            </li>

            <li class="list-group-item d-flex align-items-center">
                <!-- SVG Icon Data -->
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#198754" viewBox="0 0 16 16" class="me-3">
                    <path d="M0 0h1v16H0V0zm15 0h1v16h-1V0zM3 2h10v12H3V2zm2 2v8h6V4H5z"/>
                </svg>
                Melihat data warga penerima bantuan.
            </li>

            <li class="list-group-item d-flex align-items-center">
                <!-- SVG Icon Info -->
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#198754" viewBox="0 0 16 16" class="me-3">
                    <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.058.352.176.288.469l-.738 3.468c-.194.894.105 1.319.808 1.319.545 0 .979-.252 1.27-.598l.088-.416c-.23.252-.553.372-.832.372-.305 0-.45-.176-.388-.486l.738-3.468c.194-.894-.105-1.319-.808-1.319a1.623 1.623 0 0 0-.962.333l.082-.38 2.29-.287zM8 4.5a.905.905 0 1 1 0 1.81.905.905 0 0 1 0-1.81z"/>
                </svg>
                Informasi jadwal dan pengumuman program terbaru.
            </li>
        </ul>
    </div>
</div>

<!-- 🔽 Styling tambahan -->
<style>
    h2 {
        font-weight: 600;
        color: #198754;
    }
    .list-group-item {
        font-size: 1rem;
        padding: 0.9rem 1.2rem;
        border: none;
        border-bottom: 1px solid #e9ecef;
    }
    .list-group-item:last-child {
        border-bottom: none;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection
