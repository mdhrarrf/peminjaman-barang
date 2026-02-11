<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'totalBarang' => Barang::count(),
                'totalPeminjaman' => Peminjaman::count(),
                'totalKategori' => Kategori::count(),
            ];

            return view('dashboard', $data);
        } catch (\Exception $e) {

            return view('dashboard', [
                'totalBarang' => 0,
                'totalPeminjaman' => 0,
                'totalKategori' => 0,
            ]);
        }
    }
}
