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

    public function detailPesanan($id)
    {
        $pesanan = Pesanan::with('pelanggan')->find($id);

        if (! $pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        // kembalikan data JSON agar JS di view mengisi popup
        return response()->json(['success' => true, 'data' => $pesanan]);
    }

    public function terimaPesanan(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        // pastikan ada kolom totalBalok dan tanggalPengiriman di model
        $tglKirim = $pesanan->tanggalKirim; // sesuaikan nama kolom jika beda
        $totalBalokPesanan = (int) $pesanan->jumlahBalok;

        // hitung total balok yang sudah diterima pada tanggal yang sama (exclude current jika sudah diterima)
        $sudahDiterima = Pesanan::hitungTotalBalok($tglKirim, $id);

        // cek batas 2000
        if ($sudahDiterima + $totalBalokPesanan <= 2000) {
            // panggil method model untuk update status (misal set status = 'diterima')
            $updated = $pesanan->updateStatus('Diterima');

            if ($updated) {
                return response()->json(['success' => true, 'message' => 'Pesanan diterima']);
            }

            return response()->json(['success' => false, 'message' => 'Gagal mengubah status pesanan'], 500);
        }

        // tidak bisa diterima
        return response()->json([
            'success' => false,
            'message' => 'Pesanan tidak dapat diterima: kuota balok untuk tanggal pengiriman sudah melebihi batas (2000).'
        ], 422);
    }

    // public function validasiPassword(string $password, string $konfirmasiPassword)
    // {

    // }
}
