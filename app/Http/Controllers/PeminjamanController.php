<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {

        $peminjaman = Peminjaman::with(['user', 'detailPeminjaman.barang'])
            ->latest()
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $users = User::all();
        $barang = Barang::where('stok', '>', 0)->get();

        return view('peminjaman.create', compact('users', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'         => 'nullable|exists:users,user_id',
            'peminjam'        => 'required|string|max:100',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status'          => 'required|in:Dipinjam,Dikembalikan,Pending',
        ]);

        $peminjamanData = [
            'peminjam' => $request->peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ];

        if ($request->user_id) {
            $peminjamanData['user_id'] = $request->user_id;
        }

        $peminjaman = Peminjaman::create($peminjamanData);

        if ($request->has('barang_id')) {
            foreach ($request->barang_id as $index => $barangId) {
                if ($barangId && isset($request->jumlah_pinjam[$index])) {
                    $jumlahPinjam = $request->jumlah_pinjam[$index];

                    $barang = Barang::find($barangId);
                    // PERBAIKAN: Ganti 'jumlah' menjadi 'stok'
                    if ($barang && $barang->stok >= $jumlahPinjam) {
                        $peminjaman->detailPeminjaman()->create([
                            'barang_id' => $barangId,
                            'jumlah_pinjam' => $jumlahPinjam
                        ]);

                        // PERBAIKAN: Ganti 'jumlah' menjadi 'stok'
                        $barang->stok -= $jumlahPinjam;
                        $barang->save();
                    } else {
                        $peminjaman->delete();
                        return back()->withErrors([
                            'barang_id.' . $index => 'Stok barang "' . ($barang->nama_barang ?? 'Unknown') . '" tidak mencukupi. Stok tersedia: ' . ($barang->stok ?? 0)
                        ])->withInput();
                    }
                }
            }
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $users = User::all();
        return view('peminjaman.edit', compact('peminjaman', 'users'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id'         => 'required|exists:users,user_id',
            'peminjam'        => 'required|string|max:100',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status'          => 'required|in:Dipinjam,Dikembalikan,Pending',
        ]);

        $peminjaman->update($request->all());
        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil diperbarui!');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        foreach ($peminjaman->detailPeminjaman as $detail) {
            $barang = Barang::find($detail->barang_id);
            if ($barang) {
                $barang->stok += $detail->jumlah_pinjam;
                $barang->save();
            }
        }

        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil dihapus!');
    }
}
