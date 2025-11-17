<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan; // <-- Sudah ada
use App\Models\Akun;     // <-- TAMBAHKAN
use App\Models\Role;     // <-- TAMBAHKAN
use App\Models\Aset;     // <-- TAMBAHKAN

class PengirimanController extends Controller
{
    /**
     * Menampilkan dashboard untuk Manajer.
     */
    public function tampilkanDashboardManajer()
    {
        // 1. Tentukan status pesanan yang relevan
        $statusRelevan = ['Selesai Diproduksi', 'Siap Dikirim', 'Sedang Dikirim'];

        // 2. Ambil data pesanan
        $pesanans = Pesanan::with(['pelanggan', 'driver', 'truk'])
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        // 3. Ambil data Role "Driver"
        // Pastikan nama 'Driver' di database Anda sesuai (huruf besar/kecil)
        $driverRoleId = Role::where('role', 'Driver')->value('idRole');

        // 4. Ambil semua akun yang merupakan Driver
        $drivers = Akun::where('idRole', $driverRoleId)->get();

        // 5. Ambil semua aset (Truk)
        // Saya berasumsi semua data di tabel 'asets' adalah truk.
        // Jika ada kolom 'jenis', Anda bisa filter (misal: Aset::where('jenis', 'Truk')->get())
        $truks = Aset::all();

        // 6. Kirim semua data ke view
        return view('manajer.kelola-pengiriman', [
            'pesanans' => $pesanans,
            'drivers' => $drivers, // Kirim data drivers
            'truks' => $truks        // Kirim data truks
        ]);
    }

    /**
     * Menampilkan dashboard untuk Driver.
     */
    public function tampilkanDashboardDriver()
    {
        // ... (Tidak ada perubahan di method ini)
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
     * Method baru untuk assign Driver ke Pesanan.
     */
    public function assignDriver(Request $request)
    {
        // Validasi data
        $request->validate([
            'idPesanan' => 'required|integer|exists:pesanan,idPesanan',
            'idDriver' => 'required|integer|exists:akun,idAkun', // Validasi ke tabel akun
        ]);

        // Cari pesanan
        $pesanan = Pesanan::find($request->idPesanan);
        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        // Update idDriver
        $pesanan->idDriver = $request->idDriver;

        // Jika truk juga sudah di-set, ubah status jadi 'Siap Dikirim'
        if ($pesanan->idDriver && $pesanan->idAset && $pesanan->status == 'Selesai Diproduksi') {
            $pesanan->status = 'Siap Dikirim';
        }
        $pesanan->save();

        return response()->json(['success' => true, 'message' => 'Driver berhasil ditugaskan']);
    }

    /**
     * Method baru untuk assign Truk ke Pesanan.
     */
    public function assignTruk(Request $request)
    {
        // Validasi data
        $request->validate([
            'idPesanan' => 'required|integer|exists:pesanan,idPesanan',
            'idAset' => 'required|integer|exists:asets,id', // Validasi ke tabel asets, primary key 'id'
        ]);

        // Cari pesanan
        $pesanan = Pesanan::find($request->idPesanan);
        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        // Update idAset
        $pesanan->idAset = $request->idAset;

        // Jika driver juga sudah di-set, ubah status jadi 'Siap Dikirim'
        if ($pesanan->idDriver && $pesanan->idAset && $pesanan->status == 'Selesai Diproduksi') {
            $pesanan->status = 'Siap Dikirim';
        }
        $pesanan->save();

        return response()->json(['success' => true, 'message' => 'Truk berhasil dipilih']);
    }
}
