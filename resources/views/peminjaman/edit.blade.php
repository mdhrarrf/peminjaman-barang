@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Peminjaman</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('peminjaman.update', $peminjaman->peminjaman_id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="peminjam" class="form-label">Nama Peminjam (Manual) *</label>
                <input type="text" class="form-control" id="peminjam" name="peminjam" 
                       value="{{ old('peminjam', $peminjaman->peminjam) }}" required>
                @error('peminjam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam *</label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" 
                           value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" required>
                    @error('tanggal_pinjam')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali *</label>
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" 
                           value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" required>
                    @error('tanggal_kembali')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Dipinjam" {{ old('status', $peminjaman->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ old('status', $peminjaman->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    <option value="Pending" {{ old('status', $peminjaman->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalPinjam = document.getElementById('tanggal_pinjam');
    const tanggalKembali = document.getElementById('tanggal_kembali');
    
    tanggalPinjam.addEventListener('change', function() {
        tanggalKembali.min = this.value;
        if (tanggalKembali.value < this.value) {
            tanggalKembali.value = this.value;
        }
    });
});
</script>
@endsection