<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $barangs = Barang::where('status', 'tersedia')
            ->where('jumlah', '>', 0)
            ->latest()
            ->get();

        return view('beranda.index', compact('barangs'));
    }
}
