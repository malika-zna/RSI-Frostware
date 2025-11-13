<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'idPesanan';
    public $timestamps = false;

    protected $fillable = [
        'idPelanggan',
        'tanggalPesan',
        'tanggalKirim',
        'alamatKirim',
        'jumlahBalok',
        'totalHarga',
        'status',
        'keteranganPenolakan',
        'idDriver', // <-- TAMBAHKAN INI
        'idAset',   // <-- TAMBAHKAN INI
    ];

    protected $casts = [
        'tanggalPesan' => 'datetime',
        'tanggalKirim' => 'datetime',
    ];

    public static function hitungTotalBalok($tanggalKirim, ?int $excludeId = null)
    {
        $query = self::whereDate('tanggalKirim', Carbon::parse($tanggalKirim)->toDateString())
            ->whereRaw("LOWER(status) = 'diterima'");

        if ($excludeId) {
            $query->where('idPesanan', '<>', $excludeId);
        }

        return (int) $query->sum('jumlahBalok');
    }

    /**
     * Update status and optional keteranganPenolakan
     * Accepts an optional second argument for keterangan.
     */
    public function updateStatus(string $status, ?string $keterangan = null)
    {
        $this->status = $status;
        if (!is_null($keterangan)) {
            $this->keteranganPenolakan = $keterangan;
        }
        return (bool) $this->save();
    }

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }

    // ===== TAMBAHAN BARU: Relasi ke Driver =====
    public function driver()
    {
        // idDriver di tabel ini terhubung ke idAkun di tabel Akun
        return $this->belongsTo(Akun::class, 'idDriver', 'idAkun');
    }

    // ===== TAMBAHAN BARU: Relasi ke Truk (Aset) =====
    public function truk()
    {
        return $this->belongsTo(Aset::class, 'idAset');
    }
}
