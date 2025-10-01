<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Program Bantuan - Guest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        h1 { font-size: 24px; margin-bottom: 20px; color: #0d6efd; }
        .card { border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Daftar Program Bantuan Sosial</h1>

            @if(count($programs) > 0)
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Program</th>
                        <th>Tahun</th>
                        <th>Anggaran</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p['kode'] }}</td>
                        <td>{{ $p['nama_program'] }}</td>
                        <td>{{ $p['tahun'] }}</td>
                        <td>Rp {{ number_format($p['anggaran'], 0, ',', '.') }}</td>
                        <td>{{ $p['deskripsi'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">
                Tidak ada data program bantuan yang tersedia saat ini.
            </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
