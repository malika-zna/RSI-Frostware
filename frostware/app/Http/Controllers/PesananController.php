<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function daftarPesanan()
    {
        $pesanan = Pesanan::with('pelanggan')
            ->orderBy('status', 'asc')
            ->orderBy('idPesanan', 'asc')
            ->get();

        return view('kelolapesanan-mal', compact('pesanan'));
    }

    public function detailPesanan(int $idPesanan)
    {

    }

    // public function validasiPassword(string $password, string $konfirmasiPassword)
    // {

    // }
}
