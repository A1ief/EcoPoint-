<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $table = 'points';
    protected $primaryKey = 'id_poin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_sampah',
        'status',
        'berat',
        'deskripsi',
        'point'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'berat' => 'integer',
    ];

    /**
     * Relasi ke tb_user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke tb_sampah
     */
    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'id_sampah', 'id_sampah');
    }
}
