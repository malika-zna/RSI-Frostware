<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return view('regist-mal');
})->name('register');

Route::get('/login', function () {
    return view('login-mal');
})->name('login');


// ini bawaan laravel -mal

// Route::get('/', function () {
//     return view('welcome');
// });
