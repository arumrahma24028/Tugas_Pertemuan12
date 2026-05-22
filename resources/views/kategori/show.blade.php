@extends('layouts.app')

@section('title', 'Kategori ' . $kategori['nama'])

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $kategori['nama'] }}</li>
    </ol>
</nav>

<div class="card mb-4 bg-white shadow-sm">
    <div class="card-body">
        <h2 class="text-primary">{{ $kategori['nama'] }}</h2>
        <p class="lead mb-0">{{ $kategori['deskripsi'] }}</p>
    </div>
</div>

<h3>Daftar Buku di Kategori Ini</h3>
<table class="table table-striped table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th width="10%">ID Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th width="15%">Status Stok</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($buku_list as $buku)
        <tr>
            <td>{{ $buku['id'] }}</td>
            <td><strong>{{ $buku['judul'] }}</strong></td>
            <td>{{ $buku['pengarang'] }}</td>
            <td>
                @if ($buku['stok'] > 0)
                    <span class="badge bg-success">{{ $buku['stok'] }} Tersedia</span>
                @else
                    <span class="badge bg-danger">Habis</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-4">Belum ada koleksi buku di kategori ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali ke Kategori</a>
</div>
@endsection