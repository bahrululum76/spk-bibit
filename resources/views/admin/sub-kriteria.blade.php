@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Kelola Sub Kriteria</h1>
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
                                <h3 class="card-title">Tabel Data Sub Kriteria dari {{ $kriteria['nama'] }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <button type="button" class="btn btn-sm btn-primary" style="margin-bottom:10px"
                                        id="tambah">Tambah Sub Kriteria</button>
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Ukuran</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    {{ $item->nilai['nama'] }}
                                                </td>
                                                <td>
                                                    {{ $item->ukuran_min }} - {{ $item->ukuran_maks }}
                                                </td>
                                                <td>
                                                    {{ $item->satuan }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        id="ubah{{ $item->id_sub_kriteria }}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-default{{ $item->id_sub_kriteria }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    <div class="modal fade"
                                                        id="modal-default{{ $item->id_sub_kriteria }}">
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
                                                                        action="{{ route('sub-kriteria.destroy', $item->id_sub_kriteria) }}"
                                                                        method="post">
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
                                <h3 class="card-title">Form Tambah Sub Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('sub-kriteria.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Sub Kriteria</label>
                                                <input type="hidden" name="id_kriteria" required class="form-control"
                                                    value="{{ $kriteria->id_kriteria }}">
                                                <input type="text" name="nama" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ukuran Minimal</label>
                                                <input type="number" name="ukuran_min" step="0.01" required
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ukuran Maksimal</label>
                                                <input type="number" name="ukuran_maks" step="0.01" required
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Satuan</label>
                                                <input type="text" name="satuan" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nilai</label>
                                                <select class="form-control" name="id_nilai">
                                                    @foreach ($nilai as $nli)
                                                        <option value="{{ $nli->id_nilai }}">{{ $nli->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" id="batal" class="btn btn-secondary">Batal</button>
                                </div>
                            </form>
                        </div>
                        <div class="card" id="formubah">
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Sub Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="" method="POST" id="formupdate">
                                @method('PATCH')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Sub Kriteria</label>
                                                <input type="text" name="nama" id="nama" required class="form-control"
                                                    placeholder="Contoh : RAM ">
                                            </div>
                                            <div class="form-group">
                                                <label>Ukuran Minimal</label>
                                                <input type="number" name="ukuran_min" step="0.01" id="ukuran_min" required
                                                    class="form-control" placeholder="Contoh : 2">
                                            </div>
                                            <div class="form-group">
                                                <label>Ukuran Maksimal</label>
                                                <input type="number" name="ukuran_maks" step="0.01" id="ukuran_maks"
                                                    required class="form-control" placeholder="Contoh : 5">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <input type="text" name="satuan" id="satuan" required class="form-control"
                                                    placeholder="Contoh : GB">
                                            </div>
                                            <div class="form-group">
                                                <label>Nilai</label>
                                                <select class="form-control" name="id_nilai" id="id_nilai">
                                                    @foreach ($nilai as $nli)
                                                        <option value="{{ $nli->id_nilai }}">{{ $nli->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" id="batalubah" class="btn btn-danger">Batal</button>
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
            @foreach ($data as $item)
                $('#ubah{{ $item->id_sub_kriteria }}').click(function(){
            
                $("#formubah").css("display", "block");
                $('#nama').val('{{ $item->nama }}');
                $('#ukuran_min').val('{{ $item->ukuran_min }}');
                $('#ukuran_maks').val('{{ $item->ukuran_maks }}');
                $('#satuan').val('{{ $item->satuan }}');
                // $("#id_nilai").append('<option selected value={{ $item->id_sub_kriteria }}>{{ $item->nilai['nama'] }}
                    $('#formupdate').attr('action', '{{ route('sub-kriteria.update', $item->id_sub_kriteria) }}');
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
