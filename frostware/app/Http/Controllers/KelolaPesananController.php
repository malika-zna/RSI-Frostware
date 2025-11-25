<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;

class KelolaPesananController extends Controller
{
    public function daftarPesanan()
    {
        $statusTampil = ['Belum Diverifikasi', 'Diterima', 'Ditolak'];

        $pesanan = Pesanan::with('pelanggan')
            ->whereRaw('status IN ("' . implode('","', $statusTampil) . '")')
            ->whereDate('tanggalKirim', '>=', Carbon::tomorrow()->format('Y-m-d'))
            ->orderBy('status', 'asc')
            ->orderBy('idPesanan', 'asc')
            ->get();

        $summary = Pesanan::selectRaw('DATE(tanggalKirim) as tanggal, SUM(jumlahBalok) as total_balok')
            ->whereRaw("status = 'Diterima'")
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get()
            ->map(function ($r) {
                return (object) [
                    'tanggal' => Carbon::parse($r->tanggal)->format('d/m/Y'),
                    'total_balok' => (int) $r->total_balok,
                ];
            });

        $this->tolakTerlewat();

        return view('KelolaPesanan-mal.KelolaPesanan', compact('pesanan', 'summary'));
    }

    public function tampilkanRingkasan()
    {
        $rows = Pesanan::selectRaw('DATE(tanggalKirim) as tanggal, SUM(jumlahBalok) as total_balok')
            ->whereRaw("status = 'Diterima'")
            ->whereDate('tanggalKirim', '>=', Carbon::tomorrow()->format('Y-m-d'))
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get()
            ->map(function ($r) {
                return [
                    'tanggal' => $r->tanggal ? Carbon::parse($r->tanggal)->format('d/m/Y') : null,
                    'total_balok' => (int) $r->total_balok,
                ];
            });

        return response()->json(['success' => true, 'data' => $rows]);
    }

    public function detailPesanan($id)
    {
        $pesanan = Pesanan::with('pelanggan')->find($id);

        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'idPesanan' => $pesanan->idPesanan,
                'pelanggan' => $pesanan->pelanggan,
                'jumlahBalok' => $pesanan->jumlahBalok,
                'tanggalPesan' => $pesanan->tanggalPesan ? $pesanan->tanggalPesan->format('d/m/Y') : null,
                'tanggalKirim' => $pesanan->tanggalKirim ? $pesanan->tanggalKirim->format('d/m/Y') : null,
                'alamatKirim' => $pesanan->alamatKirim,
                'status' => $pesanan->status,
                'keteranganPenolakan' => $pesanan->keteranganPenolakan,
            ],
        ]);
    }

    public function terimaPesanan($id)
    {
        $pesanan = Pesanan::find($id);

        $tglKirim = $pesanan->tanggalKirim;
        $totalBalokPesanan = (int) $pesanan->jumlahBalok;

        $sudahDiterima = Pesanan::hitungTotalBalok($tglKirim);

        if ($sudahDiterima + $totalBalokPesanan > 2000) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak dapat diterima karena jumlah pesanan untuk tanggal pengiriman ini akan melebihi 2000 balok'
            ], 422);
        }

        $pesanan->updateStatus('Diterima', null);

        return response()->json(['success' => true, 'message' => 'Pesanan diterima']);
    }

    public function tolakPesanan(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->updateStatus('Ditolak', $request->keterangan);

        return response()->json(['success' => true, 'message' => 'Pesanan ditolak']);
    }

    private function tolakTerlewat()
    {
        $harini = Carbon::today()->format('Y-m-d');
        $pesan = 'Resepsionis tidak menerima pesanan Anda';

        return Pesanan::whereRaw("status = 'Belum Diverifikasi'")
            ->whereDate('tanggalKirim', '<=', $harini)
            ->update([
                'status' => 'Ditolak',
                'keteranganPenolakan' => $pesan,
            ]);
    }
}