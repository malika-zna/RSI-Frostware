<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class ProduksiController extends Controller
{
    // Ambil daftar produksi yang siap diproduksi
    public function ambilDaftarProduksi()
    {
        // Mengambil pesanan dengan status produksi yang aktif
        $daftarProduksi = Pesanan::where('status', 'Diterima')->get();
        return view('produksi-fad', ['daftarProduksi' => $daftarProduksi]);
    }

    // Ambil urutan produksi berdasarkan waktu pengiriman
    public function ambilUrutanProduksi()
    {
        $daftarUrutanProduksi = Pesanan::where('status', 'Diterima')
            ->orderBy('tanggalKirim', 'asc')
            ->get();
        return view('produksi-fad', ['daftarProduksi' => $daftarUrutanProduksi]);
    }

    // Proses selesai produksi
    public function prosesSelesaiProduksi($idPesanan)
    {
        $pesanan = Pesanan::findOrFail($idPesanan);
        $pesanan->statusProduksi = 'Selesai';
        $pesanan->save();
        // Kembalikan status terbaru ke view
        return response()->json(['status' => 'success', 'idPesanan' => $idPesanan]);
    }
}
