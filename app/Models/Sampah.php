<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampahs';
    protected $primaryKey = 'id_sampah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'kriteria',
        'berat',
        'jenis',
        'foto',
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
     * Relasi ke tb_poin
     */
    public function poin()
    {
        return $this->hasMany(Point::class, 'id_sampah', 'id_sampah');
    }

    /**
     * Relasi ke tb_superadmin
     */
    public function superadmin()
    {
        return $this->hasMany(SuperAdmin::class, 'id_sampah', 'id_sampah');
    }
}
