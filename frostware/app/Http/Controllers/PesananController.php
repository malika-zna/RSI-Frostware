<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    public function daftarPesanan()
    {
        $pesanan = Pesanan::with('pelanggan')
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

        return view('kelolapesanan-mal', compact('pesanan', 'summary'));
    }

    public function tampilkanRingkasan()
    {
        $rows = Pesanan::selectRaw('DATE(tanggalKirim) as tanggal, SUM(jumlahBalok) as total_balok')
            ->whereRaw("status = 'Diterima'")
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get()
            ->map(function ($r) {
                return [
                    'tanggal' => Carbon::parse($r->tanggal)->format('d/m/Y'),
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

        // kembalikan data JSON agar JS di view mengisi popup
        return response()->json(['success' => true, 'data' => $pesanan]);
    }

    public function terimaPesanan(Request $request, $id)
    {
        // try {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        $tglKirim = $pesanan->tanggalKirim;
        $totalBalokPesanan = (int) $pesanan->jumlahBalok;

        // hitung total yang sudah diterima (exclude current id)
        $sudahDiterima = Pesanan::hitungTotalBalok($tglKirim, $id);

        if ($sudahDiterima + $totalBalokPesanan > 2000) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak dapat diterima karena jumlah pesanan untuk tanggal pengiriman ini sudah melebihi 2000 balok.'
            ], 422);
        }

        // DB::beginTransaction();
        $pesanan->status = 'Diterima';
        $pesanan->save();
        // DB::commit();

        return response()->json(['success' => true, 'message' => 'Pesanan diterima']);
        // } catch (\Throwable $e) {
        //     DB::rollBack();
        //     Log::error('terimaPesanan error', [
        //         'id' => $id,
        //         'message' => $e->getMessage(),
        //         'trace' => $e->getTraceAsString()
        //     ]);
        //     return response()->json(['success' => false, 'message' => 'Internal server error'], 500);
        // }
    }

    public function tolakPesanan()
    {

    }
}
