@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Peminjaman Baru</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <h5>Informasi Peminjam</h5>
                <hr>
                
                <div class="mb-3">
    {{-- <label for="user_id" class="form-label">Pilih Peminjam</label>
    <select class="form-control" id="user_id" name="user_id">
        <option value="">-- Pilih Peminjam --</option>
        @foreach($users as $user)
            <option value="{{ $user->user_id }}" {{ old('user_id') == $user->user_id ? 'selected' : '' }}>
                {{ $user->nama_lengkap }} ({{ $user->username }})
            </option>
        @endforeach
    </select>
    <small class="text-muted">Pilih nama peminjam dari daftar user</small> --}}
    @error('user_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="peminjam" class="form-label">Nama Peminjam (Manual) *</label>
    <input type="text" class="form-control" id="peminjam" name="peminjam" 
           value="{{ old('peminjam') }}" placeholder="Masukkan nama peminjam" required>
    <small class="text-muted">Wajib diisi (gunakan ini jika peminjam tidak ada di list)</small>
    @error('peminjam')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

            <div class="mb-4">
                <h5>Informasi Waktu Peminjaman</h5>
                <hr>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam *</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" 
                               value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
                        @error('tanggal_pinjam')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali *</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" 
                               value="{{ old('tanggal_kembali', date('Y-m-d', strtotime('+7 days'))) }}" required>
                        <small class="text-muted">Minimal 1 hari setelah tanggal pinjam</small>
                        @error('tanggal_kembali')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5>Status Peminjaman</h5>
                <hr>
                
                <div class="mb-3">
                    <label for="status" class="form-label">Status *</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ old('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <h5>Barang yang Dipinjam</h5>
                <hr>
                
                <div id="barang-container">
                    @if(old('barang_id'))
                        @foreach(old('barang_id', []) as $index => $barangId)
                            <div class="row mb-2 barang-item">
                                <div class="col-md-6">
                                    <label class="form-label">Barang</label>
                                    <select class="form-control" name="barang_id[]" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach($barang as $item)
                                            <option value="{{ $item->barang_id }}" 
                                                {{ $barangId == $item->barang_id ? 'selected' : '' }}>
                                                {{ $item->nama_barang }} (Stok: {{ $item->jumlah }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah_pinjam[]" 
                                           value="{{ old('jumlah_pinjam.' . $index, 1) }}" 
                                           placeholder="Jumlah" min="1" required>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-hapus-barang">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    @else

                        <div class="row mb-2 barang-item">
                            <div class="col-md-6">
                                <label class="form-label">Barang</label>
                                <select class="form-control" name="barang_id[]">
                                    <option value="">Pilih Barang</option>
                                    @foreach($barang as $item)
                                        <option value="{{ $item->barang_id }}">
                                            {{ $item->nama_barang }} (Stok: {{ $item->jumlah }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah_pinjam[]" 
                                       value="1" placeholder="Jumlah" min="1">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-hapus-barang">Hapus</button>
                            </div>
                        </div>
                    @endif
                </div>
                
                <button type="button" class="btn btn-secondary mt-2" id="tambah-barang">
                    <i class="fas fa-plus"></i> Tambah Barang Lain
                </button>
                <small class="text-muted d-block mt-1">* Barang bersifat opsional, bisa ditambahkan nanti</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Peminjaman
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const barangContainer = document.getElementById('barang-container');
    const tambahBarangBtn = document.getElementById('tambah-barang');
    
    const barangTemplate = `
        <div class="row mb-2 barang-item">
            <div class="col-md-6">
                <label class="form-label">Barang</label>
                <select class="form-control" name="barang_id[]">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $item)
                        <option value="{{ $item->barang_id }}">
                            {{ $item->nama_barang }} (Stok: {{ $item->jumlah }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah_pinjam[]" 
                       value="1" placeholder="Jumlah" min="1">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-hapus-barang">Hapus</button>
            </div>
        </div>
    `;
    
    tambahBarangBtn.addEventListener('click', function() {
        const div = document.createElement('div');
        div.innerHTML = barangTemplate;
        barangContainer.appendChild(div.firstElementChild);
    });
    
    barangContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-hapus-barang')) {
            e.target.closest('.barang-item').remove();
        }
    });
    const tanggalPinjam = document.getElementById('tanggal_pinjam');
    const tanggalKembali = document.getElementById('tanggal_kembali');
    
    tanggalPinjam.addEventListener('change', function() {
        tanggalKembali.min = this.value;
        if (tanggalKembali.value < this.value) {
            tanggalKembali.value = this.value;
        }
    });
    
    tanggalKembali.addEventListener('change', function() {
        if (this.value < tanggalPinjam.value) {
            alert('Tanggal kembali harus setelah tanggal pinjam');
            this.value = tanggalPinjam.value;
        }
    });
    
    barangContainer.addEventListener('change', function(e) {
        if (e.target.name === 'barang_id[]') {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const jumlahInput = e.target.closest('.barang-item').querySelector('input[name="jumlah_pinjam[]"]');
            
            if (selectedOption.value) {

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
        }
    });
});
</script>
@endsection