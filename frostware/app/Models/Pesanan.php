<?php

namespace App\Models;

use DateTimeInterface;
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

    public static function hitungTotalBalok(DateTimeInterface $tanggalKirim)
    {
        // $query = self::whereDate('tanggalKirim', Carbon::parse($tanggalKirim)->toDateString())
        //     ->whereRaw("LOWER(status) = 'diterima'")->where('idPesanan', '<>', $excludeId);

        // if ($excludeId) {
        //     $query->where('idPesanan', '<>', $excludeId);
        // }

        return (int) self::whereDate('tanggalKirim', $tanggalKirim->format('Y-m-d'))
            ->whereRaw("LOWER(status) = 'diterima'")
            // ->where('idPesanan', '<>', $excludeId)
            ->sum('jumlahBalok');
        // return (int) $query->sum('jumlahBalok');
    }


    public function updateStatus(string $status, ?string $keterangan = null)
    {
        $this->status = $status;
        if ($keterangan != null) {
            $this->keteranganPenolakan = $keterangan;
        }
        $this->save();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }
}
