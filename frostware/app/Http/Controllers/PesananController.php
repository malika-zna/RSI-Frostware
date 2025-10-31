<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil pesanan hanya untuk pelanggan login
        $idPelanggan = Auth::id();

        $pesanans = Pesanan::where('idPelanggan', $idPelanggan)
            ->orderByDesc('tanggalPesan')
            ->get();

        return view('pelanggan.dashboard', compact('pesanans'));
    }

    public function create()
    {
        return view('pelanggan.buat-pesanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalKirim' => 'required|date|after_or_equal:today',
            'alamatKirim' => 'required|string',
            'jumlahBalok' => 'required|integer|min:1',
        ]);

        Pesanan::create([
            'idPelanggan' => Auth::id(),
            'tanggalPesan' => now(),
            'tanggalKirim' => $request->tanggalKirim,
            'alamatKirim' => $request->alamatKirim,
            'jumlahBalok' => $request->jumlahBalok,
            'status' => 'Belum Diverifikasi',
            'totalHarga' => 0,
        ]);

        return redirect()->route('dashboard.pelanggan')->with('success', 'Pesanan berhasil dibuat!');
    }
}
