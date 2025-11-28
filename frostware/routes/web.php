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
    return view('Registrasi');
})->name('register');

Route::post('/register', [RegistrasiController::class, 'registrasiAkun'])->name('register.post');

Route::post('/login', [LoginController::class, 'periksaLogin'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    return view('Login');
})->name('login');

Route::get('/ringkasan', [KelolaPesananController::class, 'tampilkanRingkasan'])->name('ringkasan');
Route::get('/kelolapesanan', [KelolaPesananController::class, 'daftarPesanan'])->name('kelolapesanan');

Route::get('/manajer/dashboard', [PengirimanController::class, 'tampilkanDashboardManajer'])->name('manajer.dashboard');
Route::get('/driver/dashboard', [PengirimanController::class, 'tampilkanDashboardDriver'])->name('driver.dashboard');

Route::get('/pesanan/{id}', [KelolaPesananController::class, 'detailPesanan'])->name('pesanan.detail');
Route::post('/pesanan/{id}/terima', [KelolaPesananController::class, 'terimaPesanan'])->name('pesanan.terima');
Route::post('/pesanan/{id}/tolak', [KelolaPesananController::class, 'tolakPesanan'])->name('pesanan.tolak');
Route::get('/kelolaaset', [AsetController::class, 'dashboardAset'])->name('kelolaaset');
Route::post('/aset/tambah', [AsetController::class, 'tambahAset'])->name('aset.tambah');
Route::post('/update-status', [AsetController::class, 'updateStatus'])->name('update.status');
Route::delete('/aset/delete/{id}', [AsetController::class, 'destroy'])->name('aset.delete');

Route::get('/produksi', [ProduksiController::class, 'ambilDaftarProduksi'])->name('produksi');

Route::get('/produksi/urutkan', [ProduksiController::class, 'ambilUrutanProduksi'])->name('produksi.urutkan');

Route::post('/produksi/selesai/{idPesanan}', [ProduksiController::class, 'prosesSelesaiProduksi'])->name('produksi.selesai');

Route::get('/EditKelolaAset', [AsetController::class, 'dashboardModeEdit'])
    ->name('EditKelolaAset');

Route::post('/aset/tambah', [AsetController::class, 'tambahAset'])
    ->name('aset.tambah');

    Route::get('/laporan-kerusakan', [AsetController::class, 'tampilkanLaporanKerusakan'])
    ->name('laporanKerusakan');

Route::get('/kelolapengirimanmjr', function () {
    return view('manajer.kelola-pengiriman');
})->name('kelolapengirimanmjr');

Route::get('/kelolapengirimandrv', function () {
    return view('driver.kelola-pengiriman');
})->name('kelolapengirimandrv');

Route::post('/pesanan/{id}/tugaskan', [PengirimanController::class, 'tugaskanPengiriman'])->name('pesanan.tugaskan');
Route::post('/pesanan/{id}/mulai', [PengirimanController::class, 'mulaiPengiriman'])->name('pesanan.mulai');
Route::post('/pesanan/{id}/selesai', [PengirimanController::class, 'selesaikanPengiriman'])->name('pesanan.selesai');

Route::middleware('auth')->group(function () {
});

Route::get('/pesanan-pelanggan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan-pelanggan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/beranda-pelanggan', [PesananController::class, 'index'])->name('beranda-pelanggan');

Route::get('/beranda-pjkeuangan', function () {
    return view('beranda-pjkeuangan');
})->name('beranda-pjkeuangan');