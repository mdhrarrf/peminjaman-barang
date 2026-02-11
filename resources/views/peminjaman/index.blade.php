@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Peminjaman</h3>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
        + Tambah Peminjaman
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $item)
                    <tr>
                        <td>{{ $item->peminjaman_id }}</td>
                        <td>{{ $item->peminjam ?? $item->user->name ?? '-' }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}</td>
                        <td>
                            <form action="{{ route('peminjaman.update_status', $item->peminjaman_id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" 
                                        class="badge border-0 bg-{{ $item->status == 'Dipinjam' ? 'warning' : ($item->status == 'Dikembalikan' ? 'success' : 'secondary') }}"
                                        onchange="this.form.submit()"
                                        style="cursor: pointer; appearance: auto;">
                                    <option value="Dipinjam" {{ $item->status == 'Dipinjam' ? 'selected' : '' }}>
                                        Dipinjam
                                    </option>
                                    <option value="Dikembalikan" {{ $item->status == 'Dikembalikan' ? 'selected' : '' }}>
                                        Dikembalikan
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('peminjaman.edit', $item->peminjaman_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('peminjaman.destroy', $item->peminjaman_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data peminjaman</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection