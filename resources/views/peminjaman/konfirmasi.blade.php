@extends('layouts.admin')

@section('title', 'Konfirmasi Peminjaman')

@section('page-title', 'Konfirmasi Peminjaman')

@section('breadcrumb')
    <li class="breadcrumb-item active">Konfirmasi Peminjaman</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengajuan Peminjaman</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Barang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah</th>
                                <th>Keperluan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $index => $peminjaman)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">{{ $peminjaman->user->nama }}</td>
                                    <td class="align-middle">
                                        {{ $peminjaman->barang->nama_barang }}<br>
                                        <small class="text-muted">Stok: {{ $peminjaman->barang->jumlah }}</small>
                                    </td>
                                    <td class="align-middle">{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</td>
                                    <td class="align-middle">{{ $peminjaman->tanggal_kembali->format('d/m/Y') }}</td>
                                    <td class="align-middle">{{ $peminjaman->jumlah_pinjam }}</td>
                                    <td class="align-middle">{{ $peminjaman->keperluan }}</td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-success btn-sm btn-approve"
                                            data-id="{{ $peminjaman->id }}">
                                            <i class="fas fa-check"></i> Setuju
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-reject"
                                            data-id="{{ $peminjaman->id }}">
                                            <i class="fas fa-times"></i> Tolak
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

    <!-- Modal Tolak -->
    <div class="modal fade" id="modalTolak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alasan Penolakan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTolak" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Alasan Penolakan</label>
                            <textarea name="alasan_penolakan" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tolak Peminjaman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Approve (hidden) -->
    <form id="formApprove" method="POST" style="display: none;">
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
                    title: 'Setujui Peminjaman?',
                    text: "Stok barang akan berkurang!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Setuju!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formApprove').attr('action', '/peminjaman/approve/' + id);
                        $('#formApprove').submit();
                    }
                });
            });

            // Reject button handler
            $('.btn-reject').click(function() {
                var id = $(this).data('id');
                $('#formTolak').attr('action', '/peminjaman/reject/' + id);
                $('#modalTolak').modal('show');
            });
        });
    </script>
@endpush
