<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
>>>>>>> 44fc51f (push)

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
=======
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'password',
        'role',
        'is_active'
>>>>>>> 44fc51f (push)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array<int, string>
>>>>>>> 44fc51f (push)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
=======
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke tb_sampah
     */
    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke tb_poin
     */
    public function poin()
    {
        return $this->hasMany(Point::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke tb_superadmin
     */
    public function superadmin()
    {
        return $this->hasMany(SuperAdmin::class, 'id_user', 'id_user');
>>>>>>> 44fc51f (push)
    }
}
