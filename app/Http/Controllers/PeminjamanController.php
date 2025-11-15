<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'super admin'])) {
            $peminjamans = Peminjaman::with(['user', 'barang'])->latest()->get();
        } else {
            $peminjamans = Peminjaman::with(['barang'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::where('status', 'tersedia')->get();
        return view('peminjaman.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeminjamanRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = 'menunggu';

        // Validasi stok
        $barang = Barang::find($data['barang_id']);
        if ($barang->jumlah < $data['jumlah_pinjam']) {
            return redirect()->back()
                ->with('error', 'Stok barang tidak mencukupi');
        }

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        $data = $request->validated();
        $peminjaman->update($data);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus');
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = $peminjaman->barang;

        // Cek stok
        if ($barang->jumlah < $peminjaman->jumlah_pinjam) {
            return redirect()->back()
                ->with('error', 'Stok barang tidak mencukupi');
        }

        // Update status peminjaman
        $peminjaman->update(['status' => 'dipinjam']);

        // Kurangi stok barang
        $barang->jumlah -= $peminjaman->jumlah_pinjam;
        if ($barang->jumlah == 0) {
            $barang->status = 'tidak tersedia';
        }
        $barang->save();

        return redirect()->back()
            ->with('success', 'Peminjaman berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan_penolakan
        ]);

        return redirect()->back()
            ->with('success', 'Peminjaman berhasil ditolak');
    }

    public function konfirmasi()
    {
        $peminjamans = Peminjaman::with(['user', 'barang'])
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('peminjaman.konfirmasi', compact('peminjamans'));
    }
}
