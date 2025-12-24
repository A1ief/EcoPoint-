<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    protected $table = 'tb_sampah';
    protected $primaryKey = 'id_sampah';
    protected $fillable = ['id_user', 'kriteria', 'berat', 'jenis', 'foto'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}