<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'daftarAset';
    protected $primaryKey = 'idAset';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'namaAset',
        'tanggalBeli',
        'status',
        'idAset',
    ];

    protected $casts = [
      'tanggalBeli' => 'date',
    ];

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'idAset', 'idAset');
    }
}

