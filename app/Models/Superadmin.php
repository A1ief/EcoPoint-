<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Superadmin extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'tb_superadmin';
    protected $primaryKey = 'id_superadmin';

    protected $fillable = [
        'id_user',
        'id_sampah',
        'id_admin',
        'nama',
        'password',
        'email',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
