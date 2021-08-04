@extends('layfront.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Cari Alternatif Pakan</h1>
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

                        <div class="card" id="form">
                            <div class="card-header">
                                <h3 class="card-title">Form Cari Alternatif Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($kriteria as $item)
                                                <tr>
                                                    <td style="border-top:none">{{ $item->nama }}</td>
                                                    <td style="border-top:none">
                                                        <select class="form-control" name="id_sub_kriteria"
                                                            id="input{{ $item->id_kriteria }}">
                                                            <option value="0" selected>Pilih Data</option>
                                                            @forelse ($item->sub_kriterias as $sub)
                                                                <option value="{{ $sub->id_nilai }}">{{ $sub->nama }}
                                                                </option>
                                                            @empty
                                                                <option>Belum ada data</option>
                                                            @endforelse
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="cari" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                        <div class="card" id="tabel1">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Alternatif Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Pakan</th>
                                            <th>Kategori</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody id="tabel1row">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="tabel2">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Analisis Alternatif Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Pakan</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody id="tabel2row">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="tabel3">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Akhir Alternatif Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Pakan</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                            <th>Total</th>
                                            <th>Peringkat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabel3row">
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
    <script>
        var formatPrice = function(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        };
        $(document).ready(function() {
            $("#tabel1").css("display", "none");
            $("#tabel2").css("display", "none");
            $("#tabel3").css("display", "none");
            $('#cari').click(function() {
                var datapost = []
                @foreach ($kriteria as $item)
                    datapost.push({
                    id_kriteria: "{{ $item->id_kriteria }}",
                    id_nilai: $("#input{{ $item->id_kriteria }}").val()
                    });
                @endforeach
                $.ajax({
                    url: "{{ route('cari.alt.post') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: datapost,
                    },
                    success: function(response) {
                        console.log(response)
                        $("#tabel1").css("display", "block");
                        $("#tabel2").css("display", "block");
                        $("#tabel3").css("display", "block");
                        var tohtml = ''
                        response.map((x, y) => {
                            tohtml += "<tr><td>" + x.data.nama_data +
                                "</td><td>" + x.kategori.nama + "</td> <td>" + x
                                .data.harga + "</td><td>" + x.data
                                .protein + "%" +
                                "</td>  <td>" + x.data.lemak +
                                " %</td>  <td> " + x.data.air + "%" +
                                "</td></tr>";
                        })
                        $("#tabel1row").html(tohtml);

                        var tohtml2 = ''
                        response.map((x, y) => {
                            tohtml2 += "<tr><td>" + x.data.nama_data + "</td>";
                            @foreach ($kriteria as $item)
                                x.nilai_alternatifs.forEach(element => {
                                if (element.id_kriteria == "{{ $item->id_kriteria }}") {
                                tohtml2+="<td>"+element.nilai.nama+"</td>"
                                }
                                });
                            @endforeach
                            tohtml2 += "</tr>"
                        })
                        $("#tabel2row").html(tohtml2);


                        var tohtml3 = ''
                        let nno = 1;
                        response.map((x, y) => {
                            tohtml3 += "<tr><td>" + x.data.nama_data + "</td>";
                            @foreach ($kriteria as $item)
                                x.nilai_alternatifs.forEach(element => {
                                if (element.id_kriteria == "{{ $item->id_kriteria }}") {
                                tohtml3+="<td>"+element.bobot.prioritas+"</td>"
                                }
                                });
                            @endforeach
                            tohtml3 += "<td>" + x.total + "</td>";
                            tohtml3 += "<td>" + nno + "</td>";
                            tohtml3 += "</tr>";
                            nno = nno + 1;
                        })
                        $("#tabel3row").html(tohtml3);
                    },
                });
            });
        });
    </script>
@endpush
