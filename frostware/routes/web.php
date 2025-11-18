<?php

use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelolaPesananController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\AsetController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return view('regist-mal');
})->name('register');

Route::post('/register', [RegistrasiController::class, 'registrasiAkun'])->name('register.post');

Route::post('/login', [LoginController::class, 'periksaLogin'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    return view('login-mal');
})->name('login');

Route::get('/ringkasan', [KelolaPesananController::class, 'tampilkanRingkasan'])->name('ringkasan');
Route::get('/kelolapesanan', [KelolaPesananController::class, 'daftarPesanan'])->name('kelolapesanan');
Route::get('/manajer/dashboard', [PengirimanController::class, 'tampilkanDashboardManajer'])->name('manajer.dashboard');
Route::get('/driver/dashboard', [PengirimanController::class, 'tampilkanDashboardDriver'])->name('driver.dashboard');
Route::get('/pesanan/{id}', [KelolaPesananController::class, 'detailPesanan'])->name('pesanan.detail');
Route::post('/pesanan/{id}/terima', [KelolaPesananController::class, 'terimaPesanan'])->name('pesanan.terima');
Route::post('/pesanan/{id}/tolak', [KelolaPesananController::class, 'tolakPesanan'])->name('pesanan.tolak');
Route::get('/kelolaaset', [AsetController::class, 'dashboardAset'])->name('kelolaaset');

// Route::get('/verifpesanan', function () {
//     return view('popupverifpesanan-mal');
// })->name('verifpesanan');

// Route::get('/inputketerangan', function () {
//     return view('popupinputketerangan-mal');
// })->name('inputketerangan');

// Route untuk halaman produksi (setelah login) -- Fad Bingung
// Route::get('/produksi', function () {
//     return view('produksi-fad');
// })->name('produksi');

// Rute untuk menampilkan daftar produksi
Route::get('/produksi', [ProduksiController::class, 'ambilDaftarProduksi'])->name('produksi');

// Rute untuk Halaman Produksi yang Diurutkan berdasarkan tanggalKirim
// Ini dipanggil oleh method ambilUrutanProduksi()
Route::get('/produksi/urutkan', [ProduksiController::class, 'ambilUrutanProduksi'])->name('produksi.urutkan');

// Tambahkan rute untuk proses selesai produksi (asumsi ini adalah POST atau PUT)
Route::post('/produksi/selesai/{idPesanan}', [ProduksiController::class, 'prosesSelesaiProduksi'])->name('produksi.selesai');

// Route ini akan memuat file view laporkankerusakanaset-fad.blade.php
// Route::get('/asset', function () {
//     return view('laporkankerusakanaset-fad');
// });

// Route::get('/kelolaaset', function () {
//     return view('KelolaAset-can.dashboardAset');
// })->name('kelolaaset');

Route::get('/editkelolaaset', function () {
    return view('KelolaAset-can.dashboardModeEdit');
})->name('EditKelolaAset');

Route::get('/deteletetabelaaset', function () {
    return view('KelolaAset-can.popUpDeleteDaftar');
})->name('DeleteDaftarAset');

// tambahan buat punya mas zain -malika yang nambahin
Route::get('/kelolapengirimanmjr', function () {
    return view('manajer.kelola-pengiriman');
})->name('kelolapengirimanmjr');

Route::get('/kelolapengirimandrv', function () {
    return view('driver.kelola-pengiriman');
})->name('kelolapengirimandrv');


// tambahan buat punya jia -malika yang nambahin
// Route::get('/buatpesanan', function () {
//     return view('Pelanggan-jia.buat-pesanan');
// })->name('buatpesanan');

// Route::get('/beranda-pelanggan', function () {
//     return view('Pelanggan-jia.dashboard');
// })->name('beranda-pelanggan');

// Rute untuk menampilkan dashboard pelanggan
// Rute pelanggan (butuh autentikasi)
Route::middleware('auth')->group(function () {

    // Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    // Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    // Route::get('/beranda-pelanggan', [PesananController::class, 'index'])->name('beranda-pelanggan');
});
Route::get('/pesanan-pelanggan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan-pelanggan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/beranda-pelanggan', [PesananController::class, 'index'])->name('beranda-pelanggan');

Route::get('/beranda-pjkeuangan', function () {
    return view('beranda-pjkeuangan');
})->name('beranda-pjkeuangan');

// ini bawaan laravel -mal

// Route::get('/', function () {
//     return view('welcome');
// });

