@extends('layouts.app')

@section('title', 'Laporan Harian Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Laporan Harian Peminjaman</h3>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('report.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <label for="date" class="form-label">Pilih Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" 
                       value="{{ $date }}" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Peminjaman Tanggal: {{ date('d-m-Y', strtotime($date)) }}</h5>
    </div>
    <div class="card-body">
        @if($peminjaman->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->user)
                                        {{ $item->user->nama_lengkap }}
                                        @if($item->user->username)
                                            <small class="text-muted">({{ $item->user->username }})</small>
                                        @endif
                                    @else
                                        {{ $item->peminjam }}
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'Dipinjam' ? 'warning' : ($item->status == 'Dikembalikan' ? 'success' : 'secondary') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $item->detailPeminjaman->count() }} barang
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <h5>Total Peminjaman: {{ $peminjaman->count() }}</h5>
            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Tidak ada data peminjaman untuk tanggal {{ date('d-m-Y', strtotime($date)) }}
            </div>
        @endif
    </div>
</div>
@endsection