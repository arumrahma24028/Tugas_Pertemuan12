@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2>Kategori Buku</h2>
        <p class="lead">Pilih kategori buku untuk melihat koleksi perpustakaan kami.</p>
    </div>
</div>

<div class="row">
    @foreach ($kategori_list as $kat)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $kat['nama'] }}</h5>
                <p class="card-text text-muted small">{{ $kat['deskripsi'] }}</p>
            </div>
            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                <span class="badge bg-info text-dark">{{ $kat['jumlah_buku'] }} Buku</span>
                <a href="{{ route('kategori.show', $kat['id']) }}" class="btn btn-sm btn-outline-primary">
                    Lihat Koleksi
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection