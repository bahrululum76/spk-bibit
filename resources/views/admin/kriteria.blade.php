@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Kelola Kriteria</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <div class="card" id="tabeldata">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Kelola Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <button type="button" class="btn btn-block btn-primary"
                                        style="width: 160px; margin-bottom:10px" id="tambah">Tambah Kriteria</button>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.sub-kriteria', $item->id_kriteria) }}">Sub
                                                        Kriteria</a>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        id="ubah{{ $item->id_kriteria }}">Ubah</button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-default{{ $item->id_kriteria }}">
                                                        Hapus
                                                    </button>
                                                    <div class="modal fade" id="modal-default{{ $item->id_kriteria }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Konfirmasi Penghapusan Data</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah Anda Yakin Akan Menghapus Data
                                                                        {{ $item->nama }} ?</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <form
                                                                        action="{{ route('kriteria.destroy', $item->id_kriteria) }}"
                                                                        method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-default" aria-label="Close"
                                                                            class="close" data-dismiss="modal"
                                                                            type="button">Batal</button>
                                                                        <button class="btn btn-danger"
                                                                            type="submit">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="formtambah">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('kriteria.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input type="text" required class="form-control" name="nama"
                                            placeholder="Masukan Nama Kriteria">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="button" id="batal" class="btn btn-danger">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="card" id="formubah">
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="" method="POST" id="formupdate">
                                @method('PATCH')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input type="text" name="nama" id="nama" required class="form-control"
                                            placeholder="Masukan Nama Kriteria">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer"> 
                                    <button type="button" id="batalubah" class="btn btn-danger">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#formtambah").css("display", "none");
            $("#formubah").css("display", "none");
            $('#tambah').click(function() {
                $("#formtambah").css("display", "block");
                $("#tabeldata").css("display", "none");
            });
            @foreach ($kriteria as $item)
                $('#ubah{{ $item->id_kriteria }}').click(function(){
            
                $("#formubah").css("display", "block");
                $('#nama').val('{{ $item->nama }}');
                $('#formupdate').attr('action', '{{ route('kriteria.update', $item->id_kriteria) }}');
                $("#tabeldata").css("display", "none");
                });
            @endforeach


            $('#batal').click(function() {
                $("#formtambah").css("display", "none");
                $("#tabeldata").css("display", "block");
            });
            $('#batalubah').click(function() {
                $("#formubah").css("display", "none");
                $("#tabeldata").css("display", "block");
            });
        })
    </script>
@endpush
