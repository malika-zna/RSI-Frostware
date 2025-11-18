<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan; // <-- 1. IMPORT MODEL PESANAN

class PengirimanController extends Controller
{
    /**
     * Menampilkan dashboard untuk Manajer.
     */
    public function tampilkanDashboardManajer()
    {
        // 2. Tentukan status pesanan yang relevan untuk manajer
        $statusRelevan = ['Selesai Diproduksi', 'Siap Dikirim', 'Sedang Dikirim'];

        // 3. Ambil data dari database
        $pesanans = Pesanan::with(['pelanggan', 'driver', 'truk'])
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        // 4. Kirim data ke view
        return view('manajer.kelola-pengiriman', ['pesanans' => $pesanans]);
    }

    /**
     * Menampilkan dashboard untuk Driver.
     */
    public function tampilkanDashboardDriver()
    {
        // 5. Dapatkan ID driver yang sedang login dari session
        $driverId = session('akun_id');

        // 6. Tentukan status yang relevan untuk driver
        $statusRelevan = ['Siap Dikirim', 'Sedang Dikirim'];

        // 7. Ambil pesanan HANYA untuk driver ini
        $pesanans = Pesanan::with(['pelanggan', 'truk'])
            ->where('idDriver', $driverId)
            ->whereIn('status', $statusRelevan)
            ->orderBy('tanggalKirim', 'asc')
            ->get();

        // 8. Kirim data ke view
        return view('driver.kelola-pengiriman', ['pesanans' => $pesanans]);
    }
}
