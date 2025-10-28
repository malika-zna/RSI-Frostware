<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;

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

    public function detailPesanan(int $id)
    {
        $pesanan = Pesanan::with('pelanggan')->find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        // $format = fn($v) => $v ? Carbon::parse($v)->format('d/m/Y') : null;

        return response()->json([
            'idPesanan' => $pesanan->idPesanan,
            'nama' => $pesanan->pelanggan->nama,
            'email' => $pesanan->pelanggan->email,
            'nomorTelepon' => $pesanan->pelanggan->nomorTelepon,
            'jumlahBalok' => $pesanan->jumlahBalok,
            'tanggalPesan' => Carbon::parse($pesanan->tanggalPesan)->format('d/m/Y'),
            'tanggalKirim' => Carbon::parse($pesanan->tanggalKirim)->format('d/m/Y'),
            'alamatKirim' => $pesanan->alamatKirim,
            'status' => $pesanan->status,
        ]);
    }

    // public function validasiPassword(string $password, string $konfirmasiPassword)
    // {

    // }
}
