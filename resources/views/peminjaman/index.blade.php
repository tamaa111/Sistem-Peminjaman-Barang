@extends('layouts.admin')

@section('title', 'Riwayat Peminjaman')

@section('page-title', 'Riwayat Peminjaman')

@section('breadcrumb')
    <li class="breadcrumb-item active">Riwayat Peminjaman</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Peminjaman</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if (in_array(auth()->user()->role, ['admin', 'super admin']))
                                    <th>Peminjam</th>
                                @endif
                                <th>Barang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $index => $peminjaman)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    @if (in_array(auth()->user()->role, ['admin', 'super admin']))
                                        <td>{{ $peminjaman->user->nama }}</td>
                                    @endif
                                    <td>{{ $peminjaman->barang->nama_barang }}</td>
                                    <td>{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</td>
                                    <td>{{ $peminjaman->tanggal_kembali->format('d/m/Y') }}</td>
                                    <td>{{ $peminjaman->jumlah_pinjam }}</td>
                                    <td>
                                        @if ($peminjaman->status == 'menunggu')
                                            <span class="badge badge-warning">Menunggu</span>
                                        @elseif($peminjaman->status == 'dipinjam')
                                            <span class="badge badge-info">Dipinjam</span>
                                        @elseif($peminjaman->status == 'dikembalikan')
                                            <span class="badge badge-success">Dikembalikan</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peminjaman->status == 'dipinjam' && auth()->user()->role == 'user')
                                            <button type="button" class="btn btn-success btn-sm btn-kembalikan"
                                                data-id="{{ $peminjaman->id }}">
                                                <i class="fas fa-undo"></i> Kembalikan
                                            </button>
                                        @endif
                                        @if ($peminjaman->status == 'ditolak')
                                            <button type="button" class="btn btn-info btn-sm btn-alasan"
                                                data-alasan="{{ $peminjaman->alasan_penolakan }}">
                                                <i class="fas fa-info-circle"></i> Alasan
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alasan Penolakan -->
    <div class="modal fade" id="modalAlasan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alasan Penolakan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="alasan_text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Kembalikan (hidden) -->
    <form id="formKembalikan" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Kembalikan button handler
            $('.btn-kembalikan').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Kembalikan Barang?',
                    text: "Pastikan barang sudah dikembalikan ke admin!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kembalikan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formKembalikan').attr('action', '/pengembalian/kembalikan/' + id);
                        $('#formKembalikan').submit();
                    }
                });
            });

            // Alasan button handler
            $('.btn-alasan').click(function() {
                var alasan = $(this).data('alasan');
                $('#alasan_text').text(alasan);
                $('#modalAlasan').modal('show');
            });
        });
    </script>
@endpush
