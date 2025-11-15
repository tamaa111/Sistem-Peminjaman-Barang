@extends('layouts.admin')

@section('title', 'Konfirmasi Pengembalian')

@section('page-title', 'Konfirmasi Pengembalian')

@section('breadcrumb')
    <li class="breadcrumb-item active">Konfirmasi Pengembalian</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengembalian</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Dikembalikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalians as $index => $pengembalian)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pengembalian->peminjaman->user->nama }}</td>
                                    <td>{{ $pengembalian->peminjaman->barang->nama_barang }}</td>
                                    <td>{{ $pengembalian->peminjaman->jumlah_pinjam }}</td>
                                    <td>{{ $pengembalian->tanggal_dikembalikan->format('d/m/Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm btn-approve"
                                            data-id="{{ $pengembalian->id }}">
                                            <i class="fas fa-check"></i> Selesai
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-reject"
                                            data-id="{{ $pengembalian->id }}">
                                            <i class="fas fa-exclamation-triangle"></i> Bermasalah
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Approve (hidden) -->
    <form id="formApprove" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Form Reject (hidden) -->
    <form id="formReject" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Approve button handler
            $('.btn-approve').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi Pengembalian?',
                    text: "Barang akan dikembalikan ke stok!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Selesai!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formApprove').attr('action', '/pengembalian/approve/' + id);
                        $('#formApprove').submit();
                    }
                });
            });

            // Reject button handler
            $('.btn-reject').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Barang Bermasalah?',
                    text: "Tandai pengembalian ini sebagai bermasalah?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Bermasalah!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formReject').attr('action', '/pengembalian/reject/' + id);
                        $('#formReject').submit();
                    }
                });
            });
        });
    </script>
@endpush
