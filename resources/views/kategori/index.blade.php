@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $item)
                <tr>
                    <td>{{ $item->kategori_id }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->kategori_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data kategori</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection