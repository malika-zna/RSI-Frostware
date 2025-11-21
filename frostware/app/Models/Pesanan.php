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
        'idDriver',
        'idAset',
        'idTruk',
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

    public function updateStatus(string $status, ?string $keterangan = null)
    {
        $this->status = $status;
        if (!is_null($keterangan)) {
            $this->keteranganPenolakan = $keterangan;
        }
        return (bool) $this->save();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }

    public function driver()
    {
        return $this->belongsTo(Akun::class, 'idDriver', 'idAkun');
    }

    public function truk()
    {
        return $this->belongsTo(Aset::class, 'idAset');
    }
}
