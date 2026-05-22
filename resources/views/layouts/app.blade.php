<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Kelompok</a>
            <button class="navbar-expand-lg navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/perpustakaan">Daftar Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/anggota">Daftar Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('kategori.index') }}">Kategori Buku</a>
                    </li>
                </ul>
                <form class="d-flex" onsubmit="event.preventDefault(); let kw = document.getElementById('searchKey').value; if(kw.trim() !== '') window.location.href='/kategori/search/'+kw;">
                    <input class="form-control me-2" type="search" id="searchKey" placeholder="Cari Kategori..." required>
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>