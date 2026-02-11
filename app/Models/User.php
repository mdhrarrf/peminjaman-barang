<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'role_id',     
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'user_id', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
