<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bansos Guest')</title>

    {{-- Bootstrap (opsional, untuk tampilan rapi) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Corebiz Theme --}}
    <style>
        :root {
            --core-primary: #00A99D;
            --core-dark: #06393A;
            --core-accent: #F6F9F8;
        }
        body {
            background-color: var(--core-accent);
            color: var(--core-dark);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        header {
            background: linear-gradient(90deg, var(--core-primary), var(--core-dark));
            color: white;
            padding: 1rem;
            text-align: center;
            font-weight: bold;
        }
        footer {
            background-color: var(--core-dark);
            color: #fff;
            text-align: center;
            padding: 0.7rem;
            font-size: 0.9rem;
            margin-top: 2rem;
        }
        main.container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        Sistem Informasi Bansos Guest Area
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} BinaDesa - Corebiz Theme
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
