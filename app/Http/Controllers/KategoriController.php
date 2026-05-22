<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Data Kategori
    private function get_kategori_data()
    {
        return [
            1 => [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku tentang dunia pemrograman, pengembangan software, dan coding.',
                'jumlah_buku' => 3
            ],
            2 => [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku panduan perancangan, manajemen, dan optimasi basis data.',
                'jumlah_buku' => 1
            ],
            3 => [
                'id' => 3,
                'nama' => 'Web Design',
                'deskripsi' => 'Buku penataan layout web, UI/UX, keindahan estetika situs modern.',
                'jumlah_buku' => 1
            ],
            4 => [
                'id' => 4,
                'nama' => 'Matematika',
                'deskripsi' => 'Buku logika matematika dan matematika dalam pemprograman.',
                'jumlah_buku' => 0
            ],
            5 => [
                'id' => 5,
                'nama' => 'Fiksi',
                'deskripsi' => 'Kumpulan novel, cerita pendek, karya sastra narasi imajinatif.',
                'jumlah_buku' => 0
            ]
        ];
    }

    // Data Relasi Buku dalam Kategori
    private function get_buku_by_kategori()
    {
        return [
            1 => [ // Kategori Programming
                ['id' => 101, 'judul' => 'Pemrograman PHP', 'pengarang' => 'Budi Raharjo', 'stok' => 10],
                ['id' => 102, 'judul' => 'Laravel Framework', 'pengarang' => 'Andi Nugroho', 'stok' => 5],
                ['id' => 103, 'judul' => 'JavaScript Modern', 'pengarang' => 'Rina Wijaya', 'stok' => 12],
            ],
            2 => [ // Kategori Database
                ['id' => 201, 'judul' => 'MySQL Database', 'pengarang' => 'Siti Aminah', 'stok' => 0],
            ],
            3 => [ // Kategori Web Design
                ['id' => 301, 'judul' => 'Web Design Fundamental', 'pengarang' => 'Dedi Santoso', 'stok' => 8],
            ],
            4 => [], // Kosong
            5 => []  // Kosong
        ];
    }

    // a. Method index() - Daftar Kategori
    public function index()
    {
        $kategori_list = $this->get_kategori_data();
        return view('kategori.index', compact('kategori_list'));
    }

    // b. Method show($id) - Detail Kategori
    public function show($id)
    {
        $kategori_all = $this->get_kategori_data();

        if (!isset($kategori_all[$id])) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $kategori = $kategori_all[$id];
        $buku_list = $this->get_buku_by_kategori()[$id] ?? [];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    // c. Method search($keyword) - Cari Kategori
    public function search($keyword)
    {
        $kategori_all = $this->get_kategori_data();
        $hasil_pencarian = [];

        foreach ($kategori_all as $kategori) {
            // Pencarian case-insensitive berdasarkan nama atau deskripsi
            if (stripos($kategori['nama'], $keyword) !== false || stripos($kategori['deskripsi'], $keyword) !== false) {
                $hasil_pencarian[] = $kategori;
            }
        }

        return view('kategori.search', compact('hasil_pencarian', 'keyword'));
    }
}