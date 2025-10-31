<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Menampilkan dashboard untuk Manajer.
     */
    public function tampilkanDashboardManajer()
    {
        // Panggil view kelola-pengiriman milik manajer
        return view('manajer.kelola-pengiriman');
    }

    /**
     * Menampilkan dashboard untuk Driver.
     */
    public function tampilkanDashboardDriver()
    {
        // Panggil view kelola-pengiriman milik driver
        return view('driver.kelola-pengiriman');
    }
}

