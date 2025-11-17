@extends('layouts.main')

@section('title', 'Beranda')

@section('page-title', 'Beranda')

@section('breadcrumb')
    <li class="breadcrumb-item active">Beranda</li>
@endsection

@section('content')
    <div class="row">
        @foreach ($barangs as $barang)
            <div class="col-md-4">
                <div class="card">
                    @if ($barang->gambar)
                        <img src="{{ asset('storage/' . $barang->gambar) }}" class="card-img-top"
                            alt="{{ $barang->nama_barang }}"
                            style="height: 200px; object-fit: contain; background-color: #f8f9fa;">
                    @else
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="{{ $barang->nama_barang }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">
                            <strong>Kode:</strong> {{ $barang->kode_barang }}<br>
                            <strong>Lokasi:</strong> {{ $barang->lokasi }}<br>
                            <strong>Stok:</strong> {{ $barang->jumlah }} pcs
                        </p>
                        <button type="button" class="btn btn-primary btn-block btn-pinjam" data-id="{{ $barang->id }}"
                            data-nama="{{ $barang->nama_barang }}" data-stok="{{ $barang->jumlah }}">
                            <i class="fas fa-hand-holding"></i> Pinjam
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Pinjam -->
    <div class="modal fade" id="modalPinjam">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Peminjaman</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="barang_id" id="barang_id">
                        <div class="form-group">
                            <label>Barang</label>
                            <input type="text" id="nama_barang" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Stok Tersedia</label>
                            <input type="text" id="stok_barang" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pinjam</label>
                            <input type="number" name="jumlah_pinjam" class="form-control" min="1" required>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <textarea name="keperluan" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-pinjam').click(function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var stok = $(this).data('stok');

                $('#barang_id').val(id);
                $('#nama_barang').val(nama);
                $('#stok_barang').val(stok + ' pcs');

                // Set minimal tanggal pinjam adalah hari ini
                var today = new Date().toISOString().split('T')[0];
                $('input[name="tanggal_pinjam"]').attr('min', today);
                $('input[name="tanggal_kembali"]').attr('min', today);

                $('#modalPinjam').modal('show');
            });

            // Update minimal tanggal kembali berdasarkan tanggal pinjam
            $('input[name="tanggal_pinjam"]').change(function() {
                var tanggalPinjam = $(this).val();
                $('input[name="tanggal_kembali"]').attr('min', tanggalPinjam);
            });
        });
    </script>
@endpush
