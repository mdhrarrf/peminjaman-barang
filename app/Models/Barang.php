<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'barang_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = ['nama_barang', 'kategori_id', 'jumlah', 'kondisi', 'lokasi'];

    public $timestamps = true;

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }


    public function detailPeminjaman(): HasMany
    {
        return $this->hasMany(DetailPeminjaman::class, 'barang_id', 'barang_id');
    }
}
