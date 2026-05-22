@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $keyword)

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2>Hasil Pencarian Kategori</h2>
        <p class="lead">Menampilkan hasil untuk keyword: <span class="badge bg-warning text-dark">"{{ $keyword }}"</span></p>
    </div>
</div>

@if(count($hasil_pencarian) > 0)
    <div class="row">
        @foreach ($hasil_pencarian as $kat)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-start border-warning border-3">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        {!! str_ireplace($keyword, "<mark class='bg-warning px-1'>$keyword</mark>", $kat['nama']) !!}
                    </h5>
                    <p class="card-text text-muted small">
                        {!! str_ireplace($keyword, "<mark class='bg-warning px-1'>$keyword</mark>", $kat['deskripsi']) !!}
                    </p>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <span class="badge bg-info text-dark">{{ $kat['jumlah_buku'] }} Buku</span>
                    <a href="{{ route('kategori.show', $kat['id']) }}" class="btn btn-sm btn-primary">
                        Buka Kategori
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="alert alert-danger py-4">
        <h5>Kategori Tidak Ditemukan!</h5>
        <p class="mb-0">Maaf, kata kunci pencarian mading tidak cocok dengan nama atau deskripsi kategori mana pun.</p>
    </div>
@endif

<div class="mt-3">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali ke Utama</a>
</div>
@endsection