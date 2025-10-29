<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public static function hitungTotalBalok(string $tanggalPengiriman) {
        return self::where('status', 'diterima')
                    ->whereDate('tanggalKirim', $tanggalPengiriman)
                    ->sum('jumlahBalok');
    }

    public function updateStatus(string $status) {
        $this->status = $status;
        $this->save();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Akun::class, 'idPelanggan', 'idAkun');
    }
}
