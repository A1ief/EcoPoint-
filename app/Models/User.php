<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tb_user'; 
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'id_user', 'id_user');
    }

    public function poin()
    {
        return $this->hasMany(Poin::class, 'id_user', 'id_user');
    }
}