<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $barangs = [
            ['nama_barang' => 'Laptop ASUS Vivobook', 'kategori_id' => 1, 'stok' => 5, 'satuan' => 'Unit'],
            ['nama_barang' => 'Kursi Kantor Ergonomis', 'kategori_id' => 2, 'stok' => 15, 'satuan' => 'Buah'],
            ['nama_barang' => 'Router Mikrotik RB450Gx4', 'kategori_id' => 7, 'stok' => 3, 'satuan' => 'Unit'],
        ];

        foreach ($barangs as $barang) {
            DB::table('barang')->insert([
                'kode_barang' => 'BRG-' . rand(1000, 9999),
                'nama_barang' => $barang['nama_barang'],
                'kategori_id' => $barang['kategori_id'],
                'stok'        => $barang['stok'],
                'satuan'      => $barang['satuan'],
                'kondisi'     => 'Baik',
                'lokasi'      => 'Gudang Utama',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
