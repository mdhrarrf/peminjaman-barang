<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kategori')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategoris = [
            ['kategori_id' => 1, 'nama_kategori' => 'Elektronik'],
            ['kategori_id' => 2, 'nama_kategori' => 'Furniture'],
            ['kategori_id' => 3, 'nama_kategori' => 'Alat Tulis'],
            ['kategori_id' => 4, 'nama_kategori' => 'Kendaraan'],
            ['kategori_id' => 5, 'nama_kategori' => 'Perlengkapan Kantor'],
            ['kategori_id' => 6, 'nama_kategori' => 'Alat Kebersihan'],
            ['kategori_id' => 7, 'nama_kategori' => 'Perangkat IT'],
            ['kategori_id' => 8, 'nama_kategori' => 'Peralatan Masak'],
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategori')->insert([
                'kategori_id'   => $kategori['kategori_id'],
                'nama_kategori' => $kategori['nama_kategori'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info('Data kategori berhasil di-reset dan ditambahkan!');
    }
}
