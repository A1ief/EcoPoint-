<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Superadmin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tb_superadmin';
    protected $primaryKey = 'id_superadmin';

    protected $fillable = [
        'nama', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];
}