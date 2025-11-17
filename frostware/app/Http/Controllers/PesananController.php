<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // opsional, tapi eksplisit

class PesananController extends Controller
{
    public function index()
    {
        $idPelanggan = session('akun_id');

        if (!$idPelanggan) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $pesanans = Pesanan::where('idPelanggan', $idPelanggan)
            ->orderByDesc('tanggalPesan')
            ->get();

        return view('Pelanggan-jia.dashboard', compact('pesanans'));
    }

    public function create()
    {
        if (!session('akun_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('Pelanggan-jia.buat-pesanan');
    }

    public function store(Request $request)
    {
        if (!session('akun_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk membuat pesanan.');
        }

        $request->validate([
            'tanggalKirim' => 'required|date|after_or_equal:today',
            'alamatKirim' => 'required|string',
            'jumlahBalok' => 'required|integer|min:1',
        ]);

        try {
            Pesanan::create([
                'idPelanggan' => session('akun_id'),
                'tanggalPesan' => now(),
                'tanggalKirim' => $request->tanggalKirim,
                'alamatKirim' => $request->alamatKirim,
                'jumlahBalok' => $request->jumlahBalok,
                'status' => 'Belum Diverifikasi',
                'totalHarga' => 0,
            ]);

            return redirect()->route('beranda-pelanggan')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors('Gagal menyimpan pesanan. Silakan coba lagi atau hubungi admin.');
        }
    }
}