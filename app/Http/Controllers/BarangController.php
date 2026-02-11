<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->latest()->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah'      => 'required|integer',
            'kondisi'     => 'required|string',
            'lokasi'      => 'required|string',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah'      => 'required|integer',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {

        if ($barang->detailPeminjaman()->count() > 0) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang tidak dapat dihapus karena masih digunakan dalam peminjaman!');
        }

        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
