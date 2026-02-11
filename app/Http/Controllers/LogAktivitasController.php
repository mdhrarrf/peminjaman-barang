<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LogAktivitasController extends Controller
{
    public function daily(Request $request)
    {
        $date = $request->input('date', now()->toDateString());

     
        $peminjaman = Peminjaman::whereDate('created_at', $date)
            ->latest()
            ->get();

        $total = $peminjaman->count();

        return view('report.daily', compact('peminjaman', 'date', 'total'));
    }
}
