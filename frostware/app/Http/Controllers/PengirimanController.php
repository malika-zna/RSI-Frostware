<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Akun; // Import Model Akun
use App\Models\Truk; // Import Model Truk

class PengirimanController extends Controller
{
    /**
     * Menampilkan dashboard untuk Manajer.
     */
    public function tampilkanDashboardManajer()
    {
        $statusRelevan = ['Selesai Diproduksi', 'Siap Dikirim', 'Sedang Dikirim'];

        $pesanans = Pesanan::with(['pelanggan', 'driver', 'truk'])
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        // AMBIL DATA DRIVER
        // Ambil akun yang memiliki role 'driver'
        // Asumsi: kita cek ketersediaan berdasarkan apakah mereka sedang membawa pesanan aktif
        $drivers = Akun::whereHas('role', function($q) {
            $q->where('role', 'driver');
        })->with(['pesanan' => function($query) {
            // Cek pesanan aktif driver ini
            $query->whereIn('status', ['Siap Dikirim', 'Sedang Dikirim']);
        }])->get();

        // AMBIL DATA TRUK
        $truks = Truk::all();

        return view('manajer.kelola-pengiriman', [
            'pesanans' => $pesanans,
            'drivers' => $drivers, // Kirim ke view
            'truks' => $truks      // Kirim ke view
        ]);
    }

    /**
     * Menampilkan dashboard untuk Driver.
     */
    public function tampilkanDashboardDriver()
    {
        $driverId = session('akun_id'); // Pastikan key session sesuai dengan login Anda
        $statusRelevan = ['Siap Dikirim', 'Sedang Dikirim'];

        $pesanans = Pesanan::with(['pelanggan', 'truk'])
            ->where('idDriver', $driverId) // Pastikan kolom di DB adalah idDriver bukan idPelanggan
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

        // Jika Driver dan Truk sudah dipilih, ubah status jadi Siap Dikirim (jika belum)
        if ($pesanan->idDriver && $pesanan->idTruk && $pesanan->status == 'Selesai Diproduksi') {
            $pesanan->status = 'Siap Dikirim';
        }

        $pesanan->save();

        return redirect()->back()->with('success', 'Pengiriman berhasil dijadwalkan.');
    }
}
