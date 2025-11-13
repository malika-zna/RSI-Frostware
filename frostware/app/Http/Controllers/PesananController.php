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

        return view('Pelanggan-jia.dashboard', compact('pesanans'));
    }

    public function create()
    {
        // tampilkan form buat pesanan untuk pelanggan
        return view('Pelanggan-jia.buat-pesanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalKirim' => 'required|date|after_or_equal:today',
            'alamatKirim' => 'required|string',
            'jumlahBalok' => 'required|integer|min:1',
        ]);
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk membuat pesanan.');
        }

        try {
            Pesanan::create([
                'idPelanggan' => Auth::id(),
                'tanggalPesan' => now(),
                'tanggalKirim' => $request->tanggalKirim,
                'alamatKirim' => $request->alamatKirim,
                'jumlahBalok' => $request->jumlahBalok,
                'status' => 'Belum Diverifikasi',
                'totalHarga' => 0,
            ]);

            return redirect()->route('beranda-pelanggan')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Throwable $e) {
            // log error jika diperlukan
            // \Log::error('store pesanan error', ['error' => $e->getMessage()]);
            return back()->withInput()->withErrors('Gagal menyimpan pesanan. Silakan coba lagi atau hubungi admin.');
        }
    }
}
