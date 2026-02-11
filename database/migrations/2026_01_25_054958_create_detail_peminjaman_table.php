<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('peminjaman_id')->constrained('peminjaman', 'peminjaman_id')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barang', 'barang_id')->onDelete('restrict');
            $table->integer('jumlah_pinjam')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
