<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Berhasil - KITAPEDULI</title>
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
      text-align: center;
      flex-direction: column;
      padding: 20px;
    }
    .card {
      background: #ffffff;
      color: #0d1b2a;
      padding: 60px 40px;
      border-radius: 20px;
      width: 90%;
      max-width: 520px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    h2 {
      font-weight: bold;
      font-size: 2rem;
      margin-bottom: 20px;
    }
    p {
      font-size: 1.2rem;
      margin-bottom: 25px;
    }
    .btn {
      background-color: #1b263b;
      color: #fff;
      border: none;
      font-size: 1.2rem;
      padding: 12px 20px;
      border-radius: 10px;
      transition: 0.3s;
    }
    .btn:hover {
      background-color: #0d1b2a;
    }
    .emoji {
      font-size: 70px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="emoji">🎉</div>
    <h2>Halo, {{ $username }} 👋</h2>
    <p>Login berhasil!<br>Selamat datang di <strong>KITAPEDULI</strong>.</p>
    <a href="{{ route('auth.index') }}" class="btn">Kembali ke Login</a>
  </div>

</body>
</html>
