<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Akun;
use App\Models\Truk;

class PengirimanController extends Controller
{
    /**
     * Menampilkan dashboard untuk Manajer.
     */
    public function tampilkanDashboardManajer()
    {
        $statusRelevan = ['Selesai Diproduksi', 'Siap Dikirim', 'Sedang Dikirim'];

        // Pastikan Model Pesanan memiliki method function driver() dan truk()
        $pesanans = Pesanan::with(['pelanggan', 'driver', 'truk'])
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        // AMBIL DATA DRIVER
        // Mengambil semua akun driver
        $drivers = Akun::whereHas('role', function($q) {
            $q->where('role', 'driver');
        })->get();

        // Manual load pesanan aktif untuk menghindari error jika relasi di Model Akun belum dibuat
        foreach ($drivers as $driver) {
            $driver->pesanan_aktif = Pesanan::where('idDriver', $driver->idAkun)
                ->whereIn('status', ['Siap Dikirim', 'Sedang Dikirim'])
                ->first();
        }

        // AMBIL DATA TRUK
        $truks = Truk::all();

        return view('manajer.kelola-pengiriman', [
            'pesanans' => $pesanans,
            'drivers' => $drivers,
            'truks' => $truks
        ]);
    }

    /**
     * Menampilkan dashboard untuk Driver.
     */
    public function tampilkanDashboardDriver()
    {
        // Menggunakan session('akun_id') sesuai pola LoginController Anda
        $driverId = session('akun_id');

        $statusRelevan = ['Siap Dikirim', 'Sedang Dikirim'];

        $pesanans = Pesanan::with(['pelanggan', 'truk'])
            ->where('idDriver', $driverId)
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        return view('driver.kelola-pengiriman', ['pesanans' => $pesanans]);
    }

    /**
     * Method untuk menyimpan pemilihan Driver dan Truk
     */
    public function tugaskanPengiriman(Request $request, $idPesanan)
    {
        $pesanan = Pesanan::findOrFail($idPesanan);

        // Validasi input
        $request->validate([
            'idDriver' => 'nullable|exists:akun,idAkun',
            'idTruk' => 'nullable|exists:truk,idTruk',
        ]);

        // Update data pesanan
        if($request->has('idDriver')) {
            $pesanan->idDriver = $request->idDriver;
        }

        if($request->has('idTruk')) {
            $pesanan->idTruk = $request->idTruk;
        }

        // Ubah status jadi 'Siap Dikirim' hanya jika kedua aset sudah dipilih
        // dan status sebelumnya adalah 'Selesai Diproduksi'
        if ($pesanan->idDriver && $pesanan->idTruk && $pesanan->status == 'Selesai Diproduksi') {
            $pesanan->status = 'Siap Dikirim';
        }

        $pesanan->save();

        return redirect()->back()->with('success', 'Pengiriman berhasil dijadwalkan.');
    }

    /**
     * Method untuk memulai pengiriman (Diakses oleh Driver)
     */
    public function mulaiPengiriman($idPesanan)
    {
        $driverId = session('akun_id');
        $pesanan = Pesanan::where('idPesanan', $idPesanan)
            ->where('idDriver', $driverId) // Pastikan hanya driver yang bertugas yang bisa akses
            ->firstOrFail();

        if ($pesanan->status == 'Siap Dikirim') {
            $pesanan->status = 'Sedang Dikirim';
            $pesanan->save();
            return redirect()->back()->with('success', 'Status pengiriman diperbarui menjadi Sedang Dikirim.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak dapat dimulai.');
    }

    /**
     * Method untuk menyelesaikan pengiriman (Diakses oleh Driver)
     */
    public function selesaikanPengiriman($idPesanan)
    {
        $driverId = session('akun_id');
        $pesanan = Pesanan::where('idPesanan', $idPesanan)
            ->where('idDriver', $driverId)
            ->firstOrFail();

        if ($pesanan->status == 'Sedang Dikirim') {
            $pesanan->status = 'Diterima'; // Status akhir pesanan
            $pesanan->save();
            return redirect()->back()->with('success', 'Pengiriman telah selesai.');
        }

        return redirect()->back()->with('error', 'Pengiriman belum dapat diselesaikan.');
    }
}
