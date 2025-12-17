@extends('layouts.auth')

@section('title', 'Login Berhasil')

@section('content')
<div class="card-success" style="
    background:#ffffff;
    border-radius:20px;
    padding:60px 40px;
    box-shadow:0 10px 20px rgba(0,122,102,0.15);
    text-align:center;
    width:90%;
    max-width:480px;
">

    <div style="font-size:60px;">🎉</div>

    <h2 style="font-weight:700;color:#007a66;">Halo, {{ $email }} 👋</h2>

    <p style="color:#555;">Login berhasil!<br>Selamat datang di <strong>BinaDesa</strong>.</p>

    <p class="text-muted" style="font-size:0.9rem;">
       Mengalihkan ke Dashboard dalam 3 detik...
    </p>

    <a href="{{ route('dashboard') }}"
       class="btn btn-success"
       style="background:#007a66;border:none;border-radius:10px;padding:12px 20px;">
       Pergi ke Dashboard Sekarang
    </a>
</div>

{{-- Auto Redirect --}}
<script>
    setTimeout(function() {
        window.location.href = "{{ route('dashboard') }}";
    }, 3000);
</script>
@endsection
