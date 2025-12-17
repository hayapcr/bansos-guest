<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BinaDesa</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;

  background:
    linear-gradient(
      rgba(0, 0, 0, 0.45),
      rgba(0, 0, 0, 0.45)
    ),
    url('{{ asset("assets-guest/img/login.jpg") }}');

  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}


    .login-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0,122,102,0.15);
      padding: 40px 30px;
      max-width: 400px;
      width: 100%;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 50px rgba(0,122,102,0.25);
    }

    .login-logo {
      max-width: 150px;
      margin-bottom: 15px;
    }

    .login-title {
      font-weight: 700;
      color: #007a66;
      margin-bottom: 0;
    }

    .login-subtitle {
      color: #6c757d;
      margin-bottom: 25px;
      font-size: 0.9rem;
    }

    .btn-login {
      background-color: #007a66;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-login:hover {
      background-color: #005a48;
    }

    @media (max-width: 576px) {
      .login-card {
        padding: 30px 20px;
      }
      .login-logo {
        max-width: 120px;
      }
    }
  </style>
</head>
<body>

{{-- =======================================================
     MODE LOGIN SUKSES
======================================================= --}}
@if(isset($email))
<div class="card text-center p-4" style="border-radius:20px; max-width:400px; width:100%; box-shadow:0 10px 25px rgba(0,122,102,0.15);">
    <div style="font-size:60px;">🎉</div>
    <h2 style="font-weight:700; color:#007a66;">Halo, {{ $email }} 👋</h2>
    <p style="font-size:1rem; color:#555;">
        Login berhasil!<br>Selamat datang di <strong>BinaDesa</strong>.
    </p>
    <p class="text-muted" style="font-size:0.85rem;">Mengalihkan ke Dashboard dalam 3 detik...</p>
    <a href="{{ route('dashboard') }}" class="btn btn-login text-white mt-2">Pergi ke Dashboard Sekarang</a>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('dashboard') }}";
    }, 3000);
</script>

@else

{{-- =======================================================
                    FORM LOGIN
======================================================= --}}
<div class="login-card text-center">

    {{-- LOGO --}}
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('assets-guest/img/sibansos3.png') }}" alt="Logo BinaDesa" class="login-logo">
    </a>

    {{-- TULISAN SIBANSOS --}}
    <h1 class="login-title">SIBANSOS</h1>
    <p class="login-subtitle">Sistem Informasi Bantuan Sosial</p>

    <h2 style="font-weight:600;color:#007a66;margin-bottom:25px;">Login</h2>

    @if (session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST" class="text-start">
      @csrf

      <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Masukkan email..." required>
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
      </div>

      <button type="submit" class="btn w-100 text-white btn-login">Masuk</button>
    </form>
</div>

@endif

</body>
</html>
