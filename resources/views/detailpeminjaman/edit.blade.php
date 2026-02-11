@extends('layouts.app')

@section('title', 'Edit Detail Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Detail Peminjaman</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('detailpeminjaman.update', $detailPeminjaman) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">ID Detail</label>
                <input type="text" class="form-control" value="{{ $detailPeminjaman->detail_id ?? $detailPeminjaman->id }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Peminjaman</label>
                <input type="text" class="form-control" value="#{{ $detailPeminjaman->peminjaman_id }} - {{ $detailPeminjaman->peminjaman->peminjam ?? 'Tidak ditemukan' }}" readonly>
                <small class="text-muted">Peminjaman tidak dapat diubah</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Barang</label>
                <input type="text" class="form-control" value="{{ $detailPeminjaman->barang->nama_barang ?? 'Tidak ditemukan' }}" readonly>
                <small class="text-muted">Barang tidak dapat diubah</small>
            </div>

            <div class="mb-3">
                <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam *</label>
                <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" 
                       value="{{ old('jumlah_pinjam', $detailPeminjaman->jumlah_pinjam) }}" min="1" required>
                @error('jumlah_pinjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                
                @if($detailPeminjaman->barang)
                    <small class="text-muted">
                        Stok tersedia: {{ $detailPeminjaman->barang->jumlah + $detailPeminjaman->jumlah_pinjam }}
                    </small>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('detailpeminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jumlahInput = document.getElementById('jumlah_pinjam');
    
    // Set max value berdasarkan stok
    @if($detailPeminjaman->barang)
        const stokTersedia = {{ $detailPeminjaman->barang->jumlah + $detailPeminjaman->jumlah_pinjam }};
        jumlahInput.max = stokTersedia;
        
        if (parseInt(jumlahInput.value) > stokTersedia) {
            jumlahInput.value = stokTersedia;
            alert('Jumlah pinjam melebihi stok, diatur ke maksimal: ' + stokTersedia);
        }
    @endif
});
</script>
@endsection