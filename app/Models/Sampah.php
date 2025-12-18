<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'tb_sampah';
    protected $primaryKey = 'id_sampah';

    protected $fillable = [
        'id_user',
        'kriteria',
        'berat',
        'jenis',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function poin()
    {
        return $this->hasOne(Poin::class, 'id_sampah', 'id_sampah');
    }
}
