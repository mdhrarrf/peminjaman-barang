@extends('layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row">
    <!-- Card Statistik -->
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 class="text-white fw-bold">{{ \App\Models\Barang::count() }}</h2>
                        <p class="mb-0">Total Barang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 class="text-white fw-bold">{{ \App\Models\Peminjaman::count() }}</h2>
                        <p class="mb-0">Total Peminjaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-warning text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 class="text-white fw-bold">{{ \App\Models\Kategori::count() }}</h2>
                        <p class="mb-0">Total Kategori</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection