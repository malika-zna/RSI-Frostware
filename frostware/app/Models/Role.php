<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // perlu ditulis karena tidak mengikuti format penamaan standard
    protected $table = 'role';
    protected $primaryKey = 'idRole';
    public $timestamps = false;

    protected $fillable = [
        'role'
    ];
}
