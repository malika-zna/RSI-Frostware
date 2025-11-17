<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function tampilkanTabelLogAktivitas()
    {
        $logAktivitas = LogAktivitas::all();
        return view('dashboard', compact('logAktivitas'));
    }

    public function tampilkanLaporanKerusakan()
    {
        $asetRusak = Aset::where('status', 'rusak')->get();
        return view('popUpLaporanKerusakan', compact('asetRusak'));
    }

    public function tampilkanTabelDaftarAset()
    {
        $daftarAset = Aset::all();
        return view('dashboard', compact('daftarAset'));
    }

    public function tampilkanStatusAset()
    {
        $daftarAset = Aset::all();
        return view('dashboard', compact('daftarAset'));
    }
}