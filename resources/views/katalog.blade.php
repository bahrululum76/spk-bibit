@extends('layfront.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Katalog Pakan</h1>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-responsive-sm table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Protein</th>
                                            <th scope="col">Lemak</th>
                                            <th scope="col">Air</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($katalog as $key => $item)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $item->nama_data }}
                                                </td>
                                                <td>
                                                    {{ $item->alternatif->kategori['nama'] }}
                                                </td>
                                                <td>
                                                    Rp. {{ $item->harga }}
                                                </td>
                                                <td>
                                                    {{ $item->protein }}%
                                                </td>
                                                <td>
                                                    {{ $item->lemak }}%
                                                </td>
                                                <td>
                                                    {{ $item->air }}%
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
@endpush
