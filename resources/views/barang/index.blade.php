@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Barang</h3>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">
        + Tambah Barang
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $item)
                    <tr>
                        <td>{{ $item->barang_id }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <span class="badge bg-{{ $item->kondisi == 'Baik' ? 'success' : 'warning' }}">
                                {{ $item->kondisi }}
                            </span>
                        </td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $item->barang_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('barang.destroy', $item->barang_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus barang {{ $item->nama_barang }}?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data barang</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection