<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Daftar Program Bantuan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  body {
    background-color: #f4f6f9;
    font-family: "Segoe UI", Arial, sans-serif;
  }
  .navbar {
    background: linear-gradient(90deg, #0b2340, #143d6b);
  }
  .navbar-brand {
    color: #fff !important;
    font-weight: bold;
    letter-spacing: 1px;
    font-size: 1.8rem;
  }
  .container-scroll {
    max-height: 80vh; /* agar tidak memenuhi layar */
    overflow-y: auto; /* scroll vertikal */
    padding-right: 10px;
  }
  .card {
    border: none;
    border-radius: 16px;
    margin-bottom: 20px;
    padding: 24px; /* lebih besar */
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    font-size: 1.3rem; /* isi card lebih besar */
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.15);
  }
  .card-title {
    color: #0b2340;
    font-weight: 800;
    font-size: 1.6rem; /* judul lebih besar */
  }
  .badge-custom {
    background-color: #0b2340;
    font-size: 1rem; /* badge lebih besar */
    padding: 8px 12px;
  }
  .btn-edit, .btn-delete {
    font-size: 1.1rem; /* tombol lebih besar */
    padding: 10px 16px;
    border-radius: 10px;
  }
  .btn-edit {
    background-color: #0b2340;
    color: #fff;
  }
  .btn-edit:hover {
    background-color: #163d70;
  }
  .btn-delete {
    background-color: #dc3545;
    color: #fff;
  }
  .btn-delete:hover {
    background-color: #bb2d3b;
  }
</style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar px-4 py-3">
    <a class="navbar-brand" href="#">KITAPEDULI</a>
  </nav>

  <div class="container my-5">
    <h2 class="mb-4 fw-bold text-center text-dark">📋 Daftar Program Bantuan</h2>

    <div class="container-scroll">
      @if(isset($programs) && count($programs) > 0)
        @foreach($programs as $p)
          <div class="card">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title">{{ $p['nama_program'] ?? $p->nama_program }}</h4>
                <p class="mb-2">
                  <span class="badge badge-custom">Kode: {{ $p['kode'] ?? $p->kode }}</span>
                  <span class="badge bg-secondary">Tahun: {{ $p['tahun'] ?? $p->tahun }}</span>
                </p>
                <p class="mb-2 text-muted">{{ $p['deskripsi'] ?? $p->deskripsi }}</p>
                <p class="fw-bold text-success">
                  Anggaran:
                  {{ is_numeric($p['anggaran'] ?? $p->anggaran) ? 'Rp '.number_format($p['anggaran'] ?? $p->anggaran,0,',','.') : ($p['anggaran'] ?? $p->anggaran) }}
                </p>
              </div>
              <div class="d-flex flex-column gap-3">
                <a href="#" class="btn btn-edit">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button class="btn btn-delete">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="alert alert-warning">Belum ada program bantuan.</div>
      @endif
    </div>
  </div>
</body>
</html>
