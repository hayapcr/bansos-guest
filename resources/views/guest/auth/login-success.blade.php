<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Berhasil - BinaDesa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #eaf8f3, #f6fffa);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      text-align: center;
      color: #007a66;
    }

    .card-success {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 122, 102, 0.15);
      padding: 60px 40px;
      max-width: 480px;
      width: 90%;
    }

    .emoji {
      font-size: 60px;
      margin-bottom: 15px;
    }

    h2 {
      font-weight: 700;
      font-size: 1.8rem;
      margin-bottom: 15px;
    }

    p {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 30px;
    }

    .btn-home {
      background-color: #007a66;
      color: white;
      border-radius: 10px;
      padding: 12px 20px;
      font-weight: 600;
      border: none;
      transition: 0.3s;
    }

    .btn-home:hover {
      background-color: #006956;
    }
  </style>

  {{-- 🔹 Redirect otomatis ke dashboard setelah 3 detik --}}
  <script>
    setTimeout(function() {
      window.location.href = "{{ route('dashboard') }}";
    }, 3000);
  </script>
</head>
<body>
  <div class="card-success">
    <div class="emoji">🎉</div>
    <h2>Halo, {{ $email }} 👋</h2>
    <p>Login berhasil!<br>Selamat datang di <strong>BinaDesa</strong>.</p>
    <p class="text-muted" style="font-size: 0.9rem;">Mengalihkan ke Dashboard dalam 3 detik...</p>
    <a href="{{ route('dashboard') }}" class="btn-home">Pergi ke Dashboard Sekarang</a>
  </div>
</body>
</html>
