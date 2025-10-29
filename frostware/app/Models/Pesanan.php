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

    public static function hitungTotalBalok($tanggalKirim, ?int $excludeId = null): int
    {
        $query = self::whereDate('tanggalKirim', Carbon::parse($tanggalKirim)->toDateString())
            ->whereRaw("LOWER(status) = 'diterima'");

        if ($excludeId) {
            $query->where('idPesanan', '<>', $excludeId);
        }

        return (int) $query->sum('jumlahBalok');
    }


    public function updateStatus(string $status): bool
    {
        $this->status = $status;
        return (bool) $this->save();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }
}
