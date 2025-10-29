<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;

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

Route::get('/ringkasan', [PesananController::class, 'tampilkanRingkasan'])->name('ringkasan');
Route::get('/kelolapesanan', [PesananController::class, 'daftarPesanan'])->name('kelolapesanan');
Route::get('/pesanan/{id}', [PesananController::class, 'detailPesanan'])->name('pesanan.detail');
Route::post('/pesanan/{id}/terima', [PesananController::class, 'terimaPesanan'])->name('pesanan.terima');
Route::post('/pesanan/{id}/tolak', [PesananController::class, 'tolakPesanan'])->name('pesanan.tolak');

// Route::get('/verifpesanan', function () {
//     return view('popupverifpesanan-mal');
// })->name('verifpesanan');

// Route::get('/inputketerangan', function () {
//     return view('popupinputketerangan-mal');
// })->name('inputketerangan');

// Route untuk halaman produksi (setelah login) -- Fad Bingung
Route::get('/produksi', function () {
    return view('produksi-fad');
})->name('produksi');

// Route popup konfirmasi (muncul setelah klik “Selesai Diproduksi”)
// Route::get('/konfirmasi-produksi', function () {
//     return view('popupproduksi-fad');
// })->name('konfirmasi-produksi');

// ini bawaan laravel -mal

// Route::get('/', function () {
//     return view('welcome');
// });
