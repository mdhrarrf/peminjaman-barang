<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
   
    protected $fillable = ['nama_kategori'];
   
    public $timestamps = true;

   
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'kategori_id');
    }
}
