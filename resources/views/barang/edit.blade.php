@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Barang</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('barang.update', $barang->barang_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang *</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" 
                       value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori *</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" 
                            {{ (old('kategori_id', $barang->kategori_id) == $kat->id) ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok *</label>
                <input type="number" class="form-control" id="stok" name="stok" 
                       value="{{ old('stok', $barang->stok) }}" required min="0">
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi *</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="Baik" {{ (old('kondisi', $barang->kondisi) == 'Baik') ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak" {{ (old('kondisi', $barang->kondisi) == 'Rusak') ? 'selected' : '' }}>Rusak</option>
                    <option value="Perbaikan" {{ (old('kondisi', $barang->kondisi) == 'Perbaikan') ? 'selected' : '' }}>Perbaikan</option>
                </select>
                @error('kondisi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi *</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" 
                       value="{{ old('lokasi', $barang->lokasi) }}" required>
                @error('lokasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection