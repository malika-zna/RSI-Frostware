<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truk extends Model
{
    use HasFactory;

    protected $table = 'truk';
    protected $primaryKey = 'idTruk';

    protected $fillable = [
        'nama',
        'platNomor',
        'kapasitas',
        'status',
    ];

    // Relasi ke pesanan (opsional, jika satu truk bisa bawa banyak pesanan sekaligus)
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'idTruk', 'idTruk');
    }
}
