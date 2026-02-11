<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    protected $fillable = [
        'user_id',
        'peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];


    public function user()
    {
        // Sesuaikan primary key jika user_id adalah PK di tabel users
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function detailPeminjaman()
    {
        // Ganti 'id' menjadi 'peminjaman_id' jika itu nama kolom PK di tabel peminjaman
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id', 'peminjaman_id');
    }
    public function getNamaPeminjamAttribute()
    {
        return $this->user ? $this->user->nama_lengkap : $this->peminjam;
    }
}
