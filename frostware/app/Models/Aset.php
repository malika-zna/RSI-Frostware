<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'daftarAset';
    protected $primaryKey = 'idAset';
    public $incrementing = true;

    protected $fillable = [
        'namaAset',
        'tanggalBeli',
        'status',
    ];

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'idAset');
    }
}

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = 'logAktivitas';

    protected $fillable = [
        'idAset',
        'namaAset',
        'riwayatUpdate',
        'catatan',
        'status',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'idAset');
    }
}