<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'idAkun';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'nomorTelepon',
        'password',
        'idRole'
    ];

    public static function cariAkun(string $email, string $nomorTelepon)
    {
        return static::where('email', $email)
                    ->orWhere('nomorTelepon', $nomorTelepon)
                    ->first();
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idRole');
    }
}
