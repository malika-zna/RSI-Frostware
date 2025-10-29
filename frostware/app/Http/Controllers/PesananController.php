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

        return view('partials.popupverifpesanan-content', compact('pesanan'));
        // if (!$pesanan) {
        //     return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        // }

        // return response()->json([
        //     'idPesanan' => $pesanan->idPesanan,
        //     'nama' => $pesanan->pelanggan->nama,
        //     'email' => $pesanan->pelanggan->email,
        //     'nomorTelepon' => $pesanan->pelanggan->nomorTelepon,
        //     'jumlahBalok' => $pesanan->jumlahBalok,
        //     'tanggalPesan' => Carbon::parse($pesanan->tanggalPesan)->format('d/m/Y'),
        //     'tanggalKirim' => Carbon::parse($pesanan->tanggalKirim)->format('d/m/Y'),
        //     'alamatKirim' => $pesanan->alamatKirim,
        //     'status' => $pesanan->status,
        // ]);
    }

    public function terimaPesanan(Request $request, int $id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        $tanggalPengiriman = $pesanan->tanggalKirim;

        $totalBalok = Pesanan::hitungTotalBalok($tanggalPengiriman);

        if ($totalBalok + (int) $pesanan->jumlahBalok <= 2000) {
            $pesanan->updateStatus('diterima');
            return response()->json(['message' => 'Pesanan diterima', 'status' => 'diterima']);
        }

        return response()->json(['message' => 'Kuota pengiriman pada tanggal tersebut penuh', 'status' => $pesanan->status], 422);
    }

    public function tolakPesanan()
    {

    }
}
