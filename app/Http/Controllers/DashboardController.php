<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::where('status', 'tersedia')->count();
        $barangDipinjam = Peminjaman::where('status', 'dipinjam')->sum('jumlah_pinjam');
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        $peminjamanMenunggu = Peminjaman::where('status', 'menunggu')->count();

        $riwayatPeminjaman = Peminjaman::with(['user', 'barang'])
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard.index', compact(
            'totalBarang',
            'barangDipinjam',
            'peminjamanAktif',
            'peminjamanMenunggu',
            'riwayatPeminjaman'
        ));
    }
}
