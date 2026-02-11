<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\AuthController;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('detailpeminjaman', DetailPeminjamanController::class);

Route::get('/report', function (Request $request) {
    $date = $request->get('date', date('Y-m-d'));
    $peminjaman = Peminjaman::with(['user', 'detailPeminjaman'])
        ->whereDate('tanggal_pinjam', $date)
        ->get();

    $total = $peminjaman->count();
    return view('report.daily', compact('date', 'peminjaman', 'total'));
})->name('report.index')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('barang', BarangController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('detailpeminjaman', DetailPeminjamanController::class);
    Route::get('/report', function (Request $request) {
        $date = $request->get('date', date('Y-m-d'));

        $peminjaman = Peminjaman::with(['user', 'detailPeminjaman'])
            ->whereDate('tanggal_pinjam', $date)
            ->get();

        $total = $peminjaman->count();

        return view('report.daily', compact('date', 'peminjaman', 'total'));
    })->name('report.index');
    Route::patch('/peminjaman/{id}/update-status', function (\Illuminate\Http\Request $request, $id) {
        $peminjaman = \App\Models\Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diperbarui!');
    })->name('peminjaman.update_status');
});