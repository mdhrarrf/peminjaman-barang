@extends('layouts.app')

@section('title', 'Tambah Detail Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Detail Peminjaman</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('detailpeminjaman.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="peminjaman_id" class="form-label">Peminjaman *</label>
                <select class="form-control" id="peminjaman_id" name="peminjaman_id" required>
                    <option value="">Pilih Peminjaman</option>
                    @foreach($peminjamanList as $peminjaman)
                        <option value="{{ $peminjaman->peminjaman_id }}" {{ old('peminjaman_id') == $peminjaman->peminjaman_id ? 'selected' : '' }}>
                            #{{ $peminjaman->peminjaman_id }} - {{ $peminjaman->peminjam }} 
                            ({{ date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) }})
                        </option>
                    @endforeach
                </select>
                @error('peminjaman_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang *</label>
                <select class="form-control" id="barang_id" name="barang_id" required>
                    <option value="">Pilih Barang</option>
                    @foreach($barangList as $barang)
                        <option value="{{ $barang->barang_id }}" {{ old('barang_id') == $barang->barang_id ? 'selected' : '' }}>
                            {{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam *</label>
                <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" 
                       value="{{ old('jumlah_pinjam', 1) }}" min="1" required>
                @error('jumlah_pinjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('detailpeminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const barangSelect = document.getElementById('barang_id');
    const jumlahInput = document.getElementById('jumlah_pinjam');
    
    // Validasi stok saat barang dipilih
    barangSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            // Ekstrak stok dari teks opsi
            const stokText = selectedOption.text.match(/Stok: (\d+)/);
            if (stokText) {
                const stok = parseInt(stokText[1]);
                jumlahInput.max = stok;
                
                if (parseInt(jumlahInput.value) > stok) {
                    jumlahInput.value = stok;
                    alert('Jumlah pinjam melebihi stok, diatur ke maksimal: ' + stok);
                }
            }
        }
    });
});
</script>
@endsection