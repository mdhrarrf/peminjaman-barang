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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('set null')->onUpdate('cascade');
            $table->string('peminjam')->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
