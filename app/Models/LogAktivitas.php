<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $fillable = ['aktivitas', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
