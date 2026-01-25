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
            $table->unsignedInteger('detail_id')->autoIncrement();
            $table->unsignedInteger('peminjaman_id');
            $table->unsignedInteger('barang_id');
            $table->integer('jumlah_pinjam')->default(1);
            $table->timestamps();

            $table->foreign('peminjaman_id')->references('peminjaman_id')->on('peminjaman')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('barang_id')->references('barang_id')->on('barang')
                  ->onDelete('restrict')->onUpdate('cascade');
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
