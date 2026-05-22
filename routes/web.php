<?php
 
use Illuminate\Support\Facades\Route;

// Route default
Route::get('/', function () {
    return view('welcome');
});
 
// Route baru - return text
Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});
 
// Route dengan HTML
Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan</h1><p>Selamat datang!</p>';
});
 
// Route dengan JSON
Route::get('/buku', function () {
    return [
        'judul' => 'Laravel Programming',
        'pengarang' => 'John Doe',
        'harga' => 150000
    ];
});

// Route dengan parameter required
Route::get('/buku/{id}', function ($id) {
    return "Detail buku dengan ID: " . $id;
});
 
 
// Route dengan multiple parameters
Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

// Named route
Route::get('/perpustakaan', function () {
    return 'Halaman Perpustakaan';
})->name('perpus.home');
 
// Gunakan named route
Route::get('/test-route', function () {
    $url = route('perpus.home');
    return "URL perpustakaan: " . $url;
});


//praktikum 7
Route::get('/perpustakaan', function () {
    // Data untuk dikirim ke view
    $nama_sistem = "Sistem Perpustakaan Laravel";
    $versi = "12.x";
    $total_buku = 5;
    
    $buku_list = [
        [
            'judul' => 'Pemrograman PHP',
            'pengarang' => 'Budi Raharjo',
            'harga' => 75000,
            'stok' => 10
        ],
        [
            'judul' => 'Laravel Framework',
            'pengarang' => 'Andi Nugroho',
            'harga' => 125000,
            'stok' => 5
        ],
        [
            'judul' => 'MySQL Database',
            'pengarang' => 'Siti Aminah',
            'harga' => 95000,
            'stok' => 0
        ],
        [
            'judul' => 'Web Design',
            'pengarang' => 'Dedi Santoso',
            'harga' => 85000,
            'stok' => 8
        ],
        [
            'judul' => 'JavaScript Modern',
            'pengarang' => 'Rina Wijaya',
            'harga' => 80000,
            'stok' => 12
        ]
    ];
    
    // Return view dengan data
    return view('perpustakaan.index', [
        'nama_sistem' => $nama_sistem,
        'versi' => $versi,
        'total_buku' => $total_buku,
        'buku_list' => $buku_list
    ]);
});

use App\Http\Controllers\PerpustakaanController;
 
Route::get('/', function () {
    return view('welcome');
});
 
// Route menggunakan Controller
Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);
 

// TUGAS 1: ROUTING DAN VIEW UNTUK ANGGOTA

// Data anggota
function get_anggota_list() {
    return [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Raka Wisnu',
            'email' => 'raka@email.com',
            'telepon' => '081234997890',
            'alamat' => 'Semarang',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Diaswara Anugrah',
            'email' => 'diaswara@email.com',
            'telepon' => '085882345678',
            'alamat' => 'Bandung',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Andi Wijaya',
            'email' => 'andi@email.com',
            'telepon' => '081987654321',
            'alamat' => 'Surabaya',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@email.com',
            'telepon' => '082122232425',
            'alamat' => 'Yogyakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Eralndo Wiratama',
            'email' => 'erlando@email.com',
            'telepon' => '081344556677',
            'alamat' => 'Pekalongan',
            'status' => 'Non-Aktif'
        ],
    ];
}

// Route Daftar Anggota
Route::get('/anggota', function () {
    $anggota_list = get_anggota_list();
    return view('anggota.index', compact('anggota_list'));
})->name('anggota.index');

// Route Detail Anggota
Route::get('/anggota/{id}', function ($id) {
    $anggota_list = get_anggota_list();
    
    // Mencari anggota berdasarkan ID menggunakan Laravel Collection helper
    $anggota = collect($anggota_list)->firstWhere('id', $id);
    
    // Jika data anggota tidak ditemukan, tampilkan error 404
    if (!$anggota) {
        abort(404, 'Anggota tidak ditemukan');
    }
    
    return view('anggota.show', compact('anggota'));
})->name('anggota.show');

// TUGAS 2: CONTROLLER KATEGORI BUKU

use App\Http\Controllers\KategoriController;

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');