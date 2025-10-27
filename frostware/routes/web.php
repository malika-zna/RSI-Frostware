<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return view('regist-mal');
})->name('register');

Route::post('/register', [RegistrasiController::class, 'registrasiAkun'])->name('register.post');

Route::get('/login', function () {
    return view('login-mal');
})->name('login');

Route::get('/kelolapesanan', function () {
    return view('kelolapesanan-mal');
})->name('kelolapesanan');

// Route::get('/verifpesanan', function () {
//     return view('popupverifpesanan-mal');
// })->name('verifpesanan');

Route::get('/inputketerangan', function () {
    return view('popupinputketerangan-mal');
})->name('inputketerangan');

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
