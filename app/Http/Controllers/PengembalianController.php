<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Http\Requests\StorePengembalianRequest;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalians = Pengembalian::with(['peminjaman.user', 'peminjaman.barang'])
            ->latest()
            ->get();

        return view('pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjamans = Peminjaman::where('status', 'dipinjam')
            ->with(['user', 'barang'])
            ->get();

        return view('pengembalian.create', compact('peminjamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengembalianRequest $request)
    {
        $data = $request->validated();
        $data['status_barang'] = 'menunggu';

        $peminjaman = Peminjaman::findOrFail($data['peminjaman_id']);
        $peminjaman->update(['status' => 'dikembalikan']);

        Pengembalian::create($data);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Pengembalian barang berhasil diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        return view('pengembalian.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        return view('pengembalian.edit', compact('pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $data = $request->all();
        $pengembalian->update($data);

        return redirect()->route('pengembalian.index')
            ->with('success', 'Pengembalian berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')
            ->with('success', 'Pengembalian berhasil dihapus');
    }

    public function konfirmasi()
    {
        $pengembalians = Pengembalian::with(['peminjaman.user', 'peminjaman.barang'])
            ->where('status_barang', 'menunggu')
            ->latest()
            ->get();

        return view('pengembalian.konfirmasi', compact('pengembalians'));
    }

    public function approve($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = $pengembalian->peminjaman;
        $barang = $peminjaman->barang;

        // Update status pengembalian
        $pengembalian->update(['status_barang' => 'tidak ada masalah']);

        // Kembalikan stok barang
        $barang->jumlah += $peminjaman->jumlah_pinjam;
        $barang->status = 'tersedia';
        $barang->save();

        return redirect()->back()
            ->with('success', 'Pengembalian berhasil dikonfirmasi');
    }

    public function reject($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);

        // Update status pengembalian
        $pengembalian->update(['status_barang' => 'ada masalah']);

        return redirect()->back()
            ->with('warning', 'Pengembalian ditandai bermasalah');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Buat record pengembalian
        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'tanggal_dikembalikan' => now(),
            'status_barang' => 'menunggu'
        ]);

        // Update status peminjaman
        $peminjaman->update(['status' => 'dikembalikan']);

        return redirect()->back()
            ->with('success', 'Barang berhasil dikembalikan, menunggu konfirmasi admin');
    }
}
