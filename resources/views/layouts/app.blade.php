<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | LaporBanjir</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        header, footer { background: #f5f5f5; padding: 10px; text-align: center; }
        nav a { margin: 0 10px; text-decoration: none; }
        .card { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 6px; }
    </style>
</head>
<body>
    <header>
        <h1>LaporBanjir - BPBD Kabupaten Bandung</h1>
        <nav>
            <a href="{{ route('laporan.index') }}">Daftar Laporan</a>
            <a href="{{ route('laporan.form') }}">Form Pelaporan</a>
            @if(Route::has('jalansafe.index'))
                <a href="{{ route('jalansafe.index') }}">Tubes JalanSafe</a>
            @endif
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 BPBD Kabupaten Bandung - Praktikum Laravel</p>
    </footer>
</body>
</html>
