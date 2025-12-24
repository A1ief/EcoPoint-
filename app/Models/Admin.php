<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // <--- WAJIB ADA
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable; // <--- WAJIB DIGUNAKAN

    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['nama', 'email', 'password'];
    protected $hidden = ['password'];
}