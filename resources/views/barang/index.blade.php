@extends('layouts.main')

@section('title', 'Data Barang')

@section('page-title', 'Data Barang')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Barang</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Barang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Gambar</th>
                                <th class="align-middle">Kode Barang</th>
                                <th class="align-middle">Nama Barang</th>
                                <th class="align-middle">Lokasi</th>
                                <th class="align-middle">Jumlah</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $barang)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">
                                        @if ($barang->gambar)
                                            <img src="{{ asset('storage/' . $barang->gambar) }}" width="50"
                                                class="img-thumbnail">
                                        @else
                                            <img src="https://via.placeholder.com/50" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $barang->kode_barang }}</td>
                                    <td class="align-middle">{{ $barang->nama_barang }}</td>
                                    <td class="align-middle">{{ $barang->lokasi }}</td>
                                    <td class="align-middle">{{ $barang->jumlah }}</td>
                                    <td class="align-middle">
                                        @if ($barang->status == 'tersedia')
                                            <span class="badge badge-success">Tersedia</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-warning btn-sm btn-edit"
                                            data-id="{{ $barang->id }}" data-nama="{{ $barang->nama_barang }}"
                                            data-kode="{{ $barang->kode_barang }}" data-jumlah="{{ $barang->jumlah }}"
                                            data-lokasi="{{ $barang->lokasi }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            data-id="{{ $barang->id }}">
                                            <i class="fas fa-trash"></i>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" id="edit_nama_barang" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" id="edit_kode_barang" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" id="edit_jumlah" class="form-control" min="0"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" id="edit_lokasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Delete (hidden) -->
    <form id="formDelete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Edit button handler
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var kode = $(this).data('kode');
                var jumlah = $(this).data('jumlah');
                var lokasi = $(this).data('lokasi');

                $('#edit_nama_barang').val(nama);
                $('#edit_kode_barang').val(kode);
                $('#edit_jumlah').val(jumlah);
                $('#edit_lokasi').val(lokasi);
                $('#formEdit').attr('action', '/barang/' + id);

                $('#modalEdit').modal('show');
            });

            // Delete button handler
            $('.btn-delete').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data barang akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formDelete').attr('action', '/barang/' + id);
                        $('#formDelete').submit();
                    }
                });
            });
        });
    </script>
@endpush
