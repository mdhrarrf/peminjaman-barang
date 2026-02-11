@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Detail Peminjaman</h3>
    <a href="{{ route('detailpeminjaman.create') }}" class="btn btn-primary">
        + Tambah Detail
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Peminjaman</th>
                        <th>Barang</th>
                        <th>Jumlah Pinjam</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($detailPeminjaman as $detail)
                    <tr>
                        <td>{{ $detail->detail_id }}</td>
                        <td>
                            @if($detail->peminjaman)
                                #{{ $detail->peminjaman_id }} - {{ $detail->peminjaman->peminjam }}
                            @else
                                #{{ $detail->peminjaman_id }} (Peminjaman tidak ditemukan)
                            @endif
                        </td>
                        <td>
                            @if($detail->barang)
                                {{ $detail->barang->nama_barang }}
                            @else
                                Barang tidak ditemukan
                            @endif
                        </td>
                        <td>{{ $detail->jumlah_pinjam }}</td>
                        <td>{{ $detail->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('detailpeminjaman.edit', $detail->detail_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('detailpeminjaman.destroy', $detail->detail_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data detail peminjaman</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection