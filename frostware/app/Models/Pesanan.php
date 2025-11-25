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
        'keteranganPenolakan'
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


    public function updateStatus(string $status)
    {
        $this->status = $status;
        return (bool) $this->save();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }
    
    /*
    public static function cariDaftarProduksi()
    {
        return self::whereRaw("LOWER(status) = 'belum diproduksi'")->get();
    }

    public static function cariUrutanProduksi()
    {
        return self::whereRaw("LOWER(status) = 'belum diproduksi'")
            ->orderBy('tanggalKirim', 'asc')
            ->get();
    }

    public static function ubahStatus($idPesanan, string $status): bool
    {
        $pesanan = self::find($idPesanan);
        if (! $pesanan) {
            return false;
        }

        $pesanan->status = $status;
        return (bool) $pesanan->save();
    }
    */

}
