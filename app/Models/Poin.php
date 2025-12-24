<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    protected $table = 'tb_poin';
    protected $primaryKey = 'id_poin';
    protected $fillable = ['id_user', 'id_sampah', 'jumlah_poin', 'aksi', 'status'];
}