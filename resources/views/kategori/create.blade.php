@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Kategori Baru</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori *</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" 
                       value="{{ old('nama_kategori') }}" required>
                @error('nama_kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection