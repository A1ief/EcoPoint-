<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'tb_poin';
    protected $primaryKey = 'id_poin';

    protected $fillable = [
        'id_user',
        'id_sampah',
        'status',
        'berat',
        'aksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'id_sampah', 'id_sampah');
    }
}