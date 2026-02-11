<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';

  
    protected $primaryKey = 'detail_id'; 

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['peminjaman_id', 'barang_id', 'jumlah_pinjam'];

  
    public function getRouteKeyName()
    {
        return $this->primaryKey; 
    }

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'peminjaman_id');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'barang_id');
    }
}
