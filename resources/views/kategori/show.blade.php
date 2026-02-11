@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detail Kategori</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">ID Kategori</label>
            <input type="text" class="form-control" value="{{ $kategori->id }}" readonly>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}" readonly>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Tanggal Dibuat</label>
            <input type="text" class="form-control" value="{{ $kategori->created_at->format('d-m-Y H:i') }}" readonly>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Tanggal Diperbarui</label>
            <input type="text" class="form-control" value="{{ $kategori->updated_at->format('d-m-Y H:i') }}" readonly>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            <div>
                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection