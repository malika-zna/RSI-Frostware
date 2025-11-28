<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

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
        // Validasi sederhana
        $request->validate([
            'namaAset' => 'required|string',
            'status' => 'required|string'
        ]);

        // 1. Ambil nama aset
        $namaAset = $request->namaAset;

        // 2. Ambil inisial nama aset (contoh: Mesin Pembuat Es = MPE)
        $kata = explode(' ', $namaAset);
        $inisial = '';
        foreach ($kata as $k) {
            $inisial .= strtoupper(substr($k, 0, 1));
        }

        // 3. Cari ID terakhir yang pakai prefix tersebut
        $lastAset = Aset::where('idAset', 'LIKE', $inisial . '%')
        ->orderBy('idAset', 'desc')
        ->first();

        // 4. Tentukan nomor urut
        if ($lastAset) {
            // ambil angka bagian belakang, misal dari MPE004 → 004
            $lastNumber = (int) substr($lastAset->idAset, strlen($inisial));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = "001";
        }

        // 5. Bentuk ID lengkap
        $idAset = $inisial . $newNumber;

        // 6. Simpan
        Aset::create([
            'idAset' => $idAset,
            'namaAset' => $namaAset,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Aset berhasil ditambahkan!');
    }

    private function generateIdAset($namaAset)
    {
        // Ambil tiga huruf pertama, uppercase
        $prefix = strtoupper(substr($namaAset, 0, 3));

        // Cari id terakhir dengan prefix sama
        $last = Aset::where('idAset', 'like', $prefix . '%')
        ->orderBy('idAset', 'desc')
        ->first();

        // Nomor terakhir
        if ($last) {
            $number = (int) substr($last->idAset, 3) + 1;
        } else {
            $number = 1;
        }

        return $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function tampilkanLaporanKerusakan()
    {
        $asetRusak = Aset::where('status', 'rusak')->get();
        return view('popUpLaporanKerusakan', compact('asetRusak'));
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

    public function updateStatus(Request $request) { $request->validate([ 'idAset' => 'required', 'statusBaru' => 'required', ]); // update aset $aset = Aset::findOrFail($request->idAset); $aset->status = $request->statusBaru; $aset->save(); // catat ke log aktivitas LogAktivitas::create([ 'idAset' => $aset->idAset, 'namaAset' => $aset->namaAset, 'status' => $request->statusBaru, 'catatan' => $request->catatan, 'riwayatUpdate' => now()->format("d/m/Y"), ]); return response()->json(['success' => true]); }

}

public function delete(Request $request)
{
    // validasi
    $request->validate([
        'idAset' => 'required'
    ]);

    // cari aset
    $aset = Aset::where('idAset', $request->idAset)->first();

    if (!$aset) {
        return response()->json(['success' => false, 'message' => 'Aset tidak ditemukan'], 404);
    }

    // hapus aset
    $aset->delete();

    return response()->json(['success' => true]);
}


}