<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BinaDesa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #eaf8f3, #f6fffa);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .login-card {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 122, 102, 0.15);
      padding: 50px 40px;
      max-width: 480px;
      width: 90%;
      text-align: center;
    }

    .brand {
      font-size: 2rem;
      font-weight: 700;
      color: #007a66;
      margin-bottom: 5px;
    }

    .subtitle {
      font-size: 1rem;
      color: #6c757d;
      margin-bottom: 30px;
    }

    h2 {
      font-weight: 600;
      font-size: 1.8rem;
      margin-bottom: 25px;
      color: #007a66;
    }

    .form-label {
      font-weight: 600;
      text-align: left;
      display: block;
    }

    .form-control {
      height: 50px;
      border-radius: 10px;
      border: 1.5px solid #c8e6d6;
      transition: 0.3s;
    }

    .form-control:focus {
      border-color: #007a66;
      box-shadow: 0 0 0 0.2rem rgba(0, 122, 102, 0.2);
    }

    .btn-login {
      background-color: #007a66;
      color: white;
      font-weight: 600;
      border-radius: 10px;
      border: none;
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #006956;
    }

    .alert {
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="brand">BinaDesa</div>
    <div class="subtitle">Sistem Informasi Bantuan Sosial</div>

    <h2>Login</h2>

    @if (session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST">
      @csrf

      <div class="mb-3 text-start">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Masukkan email..." required>
      </div>

      <div class="mb-4 text-start">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
      </div>

      <button type="submit" class="btn-login">Masuk</button>
    </form>
  </div>
</body>
</html>
