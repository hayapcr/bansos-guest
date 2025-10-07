<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - KITAPEDULI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0d1b2a;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      background: #ffffff;
      color: #0d1b2a;
      width: 90%;
      max-width: 500px;
      border-radius: 15px;
      padding: 50px 40px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      font-size: 2rem;
    }
    .form-label {
      font-size: 1.2rem;
      font-weight: bold;
    }
    .form-control {
      height: 55px;
      font-size: 1.1rem;
      border-radius: 10px;
    }
    .btn {
      background-color: #1b263b;
      color: #fff;
      font-size: 1.2rem;
      border-radius: 10px;
      padding: 12px;
      margin-top: 10px;
      width: 100%;
    }
    .btn:hover {
      background-color: #0d1b2a;
    }
    .brand {
      text-align: center;
      font-weight: 800;
      font-size: 1.8rem;
      margin-bottom: 10px;
    }
    .subtitle {
      text-align: center;
      color: #415a77;
      font-size: 1rem;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="brand">KITAPEDULI</div>
    <div class="subtitle">Sistem Informasi Bantuan Sosial</div>

    <h2>Login</h2>

    @if (session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username..." required>
      </div>

      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
      </div>

      <button type="submit" class="btn">Masuk</button>
    </form>

  </div>
</body>
</html>
