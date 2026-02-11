<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class DetailPeminjamanController extends Controller
{
    public function index()
    {
        $detailPeminjaman = DetailPeminjaman::with(['peminjaman', 'barang'])->latest()->get();
        return view('detailpeminjaman.index', compact('detailPeminjaman'));
    }

    public function create()
    {
        $peminjamanList = Peminjaman::all();
        $barangList = Barang::where('jumlah', '>', 0)->get();
        return view('detailpeminjaman.create', compact('peminjamanList', 'barangList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,peminjaman_id',
            'barang_id'     => 'required|exists:barang,barang_id',
            'jumlah_pinjam' => 'required|integer|min:1',
        ]);

        
        $barang = Barang::find($request->barang_id);
        if ($barang->jumlah < $request->jumlah_pinjam) {
            return back()->withErrors(['jumlah_pinjam' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->jumlah])->withInput();
        }

        
        $barang->jumlah -= $request->jumlah_pinjam;
        $barang->save();

        DetailPeminjaman::create($request->all());

        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail berhasil ditambahkan!');
    }

    public function edit($id) 
    {
   
        $detailPeminjaman = DetailPeminjaman::with(['peminjaman', 'barang'])->findOrFail($id);

        $peminjamanList = Peminjaman::all();
        $barangList = Barang::all();

        return view('detailpeminjaman.edit', compact('detailPeminjaman', 'peminjamanList', 'barangList'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'jumlah_pinjam' => 'required|integer|min:1',
        ]);

       
        $detailPeminjaman = DetailPeminjaman::findOrFail($id);

       
        $barang = $detailPeminjaman->barang;
        if ($barang) {
            $barang->jumlah += $detailPeminjaman->jumlah_pinjam;
            $barang->save();
        }

        
        $detailPeminjaman->update(['jumlah_pinjam' => $request->jumlah_pinjam]);

        
        if ($barang) {
            if ($barang->jumlah < $request->jumlah_pinjam) {
             
                $barang->jumlah += $detailPeminjaman->jumlah_pinjam;
                $barang->save();

                return back()->withErrors(['jumlah_pinjam' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->jumlah])->withInput();
            }

            $barang->jumlah -= $request->jumlah_pinjam;
            $barang->save();
        }

        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail berhasil diperbarui!');
    }

    public function destroy($id) 
    {

        $detailPeminjaman = DetailPeminjaman::findOrFail($id);


        $barang = $detailPeminjaman->barang;
        if ($barang) {
            $barang->jumlah += $detailPeminjaman->jumlah_pinjam;
            $barang->save();
        }

        $detailPeminjaman->delete();
        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail berhasil dihapus!');
    }
}
