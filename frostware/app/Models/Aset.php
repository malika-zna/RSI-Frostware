<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'daftar_aset';
    protected $primaryKey = 'id_aset';
    public $incrementing = true;

    protected $fillable = [
        'nama_aset',
        'tanggal_beli',
        'status',
    ];

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'id_aset');
    }
}

// app/Models/LogAktivitas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = 'log_aktivitas';

    protected $fillable = [
        'id_aset',
        'nama_aset',
        'riwayat_update',
        'catatan',
        'status',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset');
    }
}