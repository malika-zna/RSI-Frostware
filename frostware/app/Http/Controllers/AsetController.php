<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AsetController extends Controller
{
    public function dashboardAset()
    {
        $daftarAset = Aset::all();
        $logAktivitas = LogAktivitas::all();

        return view('KelolaAset-can.dashboardAset', compact('daftarAset', 'logAktivitas'));
    }

    public function dashboardModeEdit()
    {
        $daftarAset = Aset::all();
        $logAktivitas = LogAktivitas::all();

        return view('KelolaAset-can.dashboardModeEdit', compact('daftarAset', 'logAktivitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaAset' => 'required|string',
            'status' => 'required|string'
        ]);

        $namaAset = $request->namaAset;
        $kata = explode(' ', $namaAset);
        $inisial = '';
        foreach ($kata as $k) {
            $inisial .= strtoupper(substr($k, 0, 1));
        }

        $lastAset = Aset::where('idAset', 'LIKE', $inisial . '%')
            ->orderBy('idAset', 'desc')
            ->first();

        if ($lastAset) {
            $lastNumber = (int) substr($lastAset->idAset, strlen($inisial));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = "001";
        }

        $idAset = $inisial . $newNumber;

        Aset::create([
            'idAset' => $idAset,
            'namaAset' => $namaAset,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Aset berhasil ditambahkan!');
    }

    private function generateIdAset($namaAset)
    {
        $prefix = strtoupper(substr($namaAset, 0, 3));
        $last = Aset::where('idAset', 'like', $prefix . '%')
            ->orderBy('idAset', 'desc')
            ->first();

        if ($last) {
            $number = (int) substr($last->idAset, 3) + 1;
        } else {
            $number = 1;
        }

        return $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function tampilkanLaporanKerusakan()
{
    $laporan = LogAktivitas::where('status', 'rusak')->get();
    $daftarAset = Aset::all();
    $logAktivitas = LogAktivitas::all();

    return view('KelolaAset-can.popUpLaporanKerusakan', compact('laporan', 'daftarAset', 'logAktivitas'));
}
    
public function tampilkanTabelDaftarAset()
    {
        $daftarAset = Aset::all();
        return view('dashboard', compact('daftarAset'));
    }

    public function tampilkanStatusAset()
    {
        $daftarAset = Aset::all();
        return view('dashboard', compact('daftarAset'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'idAset' => 'required',
            'statusBaru' => 'required',
        ]);

        $aset = Aset::findOrFail($request->idAset);
        $aset->status = $request->statusBaru;
        $aset->save();

        LogAktivitas::create([
            'idAset' => $aset->idAset,
            'namaAset' => $aset->namaAset,
            'status' => $request->statusBaru,
            'catatan' => $request->catatan ?? null,
            'riwayatUpdate' => now()->format("d/m/Y"),
        ]);

        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $request->validate(['idAset' => 'required']);

        $aset = Aset::where('idAset', $request->idAset)->first();
        if (! $aset) {
            return response()->json(['success' => false, 'message' => 'Aset tidak ditemukan'], 404);
        }

        $aset->delete();
        return response()->json(['success' => true]);
    }

    public function destroy($idAset)
    {
        $aset = Aset::where('idAset', $idAset)->first();
        if (! $aset) {
            return back()->with('error', 'Aset tidak ditemukan.');
        }
        $aset->delete();
        return redirect()->back()->with('success', 'Aset berhasil dihapus.');
    }

    public function tambahAset(Request $request)
    {
        try {
            $request->validate([
                'namaAset' => 'required|string',
                'tanggalBeli' => 'required|date'
            ]);

            $namaAset = $request->namaAset;
            $kata = explode(' ', $namaAset);
            $inisial = '';
            foreach ($kata as $k) {
                $inisial .= strtoupper(substr($k, 0, 1));
            }

            $lastAset = Aset::where('idAset', 'LIKE', $inisial . '%')
                ->orderBy('idAset', 'desc')
                ->first();

            if ($lastAset) {
                $lastNumber = (int) substr($lastAset->idAset, strlen($inisial));
                $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newNumber = "001";
            }

            $idAset = $inisial . $newNumber;

            $aset = Aset::create([
                'idAset' => $idAset,
                'namaAset' => $namaAset,
                'tanggalBeli' => $request->tanggalBeli,
                'status' => "Baik"
            ]);

            return response()->json(['success' => true, 'data' => $aset]);
        } catch (\Throwable $e) {
            Log::error('aset.tambah error', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['success' => false, 'message' => 'Internal server error'], 500);
        }
    }

}