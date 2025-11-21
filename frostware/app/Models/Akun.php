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
        if ($nomorTelepon != '') {
            return static::where('email', $email)
                ->orWhere('nomorTelepon', $nomorTelepon)
                ->first();
        } else {
            return static::with('role')
                ->where('email', $email)
                ->first();
        }
    }

    public static function cekPassword(Akun $akun, string $password)
    {
        if ($akun->password == $password) {
            return true;
        }
        return password_verify($password, $akun->password);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idRole');
    }
}
