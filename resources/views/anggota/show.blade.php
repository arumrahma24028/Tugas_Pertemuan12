<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anggota['nama'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/anggota">Anggota</a></li>
                <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
            </ol>
        </nav>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Anggota: {{ $anggota['nama'] }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Kode Anggota</th>
                                <td>: {{ $anggota['kode'] }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $anggota['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $anggota['email'] }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $anggota['telepon'] }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $anggota['alamat'] }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5>Status Keanggotaan</h5>
                                @if ($anggota['status'] == 'Aktif')
                                    <span class="badge bg-success fs-5 w-100 mt-2">Aktif</span>
                                    <p class="text-muted small mt-2">Dapat meminjam buku</p>
                                @else
                                    <span class="badge bg-danger fs-5 w-100 mt-2">Non-Aktif</span>
                                    <p class="text-muted small mt-2">Akses peminjaman ditangguhkan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="/anggota" class="btn btn-secondary">
                Kembali ke Daftar Anggota
            </a>
        </div>
    </div>
</body>
</html>