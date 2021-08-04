@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Kelola Pakan</h1>
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
                                <h3 class="card-title">Tabel Data Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <button type="button" class="btn btn-block btn-primary"
                                        style="width: 160px; margin-bottom:10px" id="tambah">Tambah Pakan</button>
                                    <thead>
                                        <tr>
                                            <th>Nama Pakan</th>
                                            <th>Kategori</th>
                                            <th>Harga/kg</th>
                                            <th>Protein</th>
                                            <th>Lemak</th>
                                            <th>Air</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)

                                            <tr>
                                                <td>{{ $item->nama_data }}</td>
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
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        onclick="ubah({{ $item }}, {{ $kriterias }}, {{ $nilaidb }}, {{ $kategori }})">Ubah</button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-default{{ $item->id_data }}">
                                                        Hapus
                                                    </button>
                                                    <div class="modal fade" id="modal-default{{ $item->id_data }}">
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
                                                                        action="{{ route('data.destroy', $item->id_data) }}"
                                                                        method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-default" data-dismiss="modal"
                                                                            type="button">Batal</button>
                                                                        <button class="btn btn-danger"
                                                                            type="submit">Hapus</button>
                                                                    </form>
                                                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                          <button type="button" class="btn btn-danger">Hapus</button> --}}
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
                            <form role="form" method="POST" action="{{ route('data.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Pakan</label>
                                                <input type="text" name="nama_data" required class="form-control"
                                                    placeholder="">
                                                <div class="form-group">
                                                    <label>Protein</label>
                                                    <input type="number" name="protein" required
                                                        class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Air</label>
                                                    <input type="number" name="air" required class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" name="harga" required class="form-control"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group">
                                                <label>Lemak</label>
                                                <input type="number" name="lemak" required class="form-control"
                                                    placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" name="id_kategori">
                                                    <option>Pilih Kategori</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategori }}">
                                                            {{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <h6 class="text-center">Penilaian</h6>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            @forelse ($kriterias as $kriteria)
                                                <tr>
                                                    <td>{{ $kriteria->nama }}</td>
                                                    <td>
                                                        <input type="hidden" name="id_kriteria[]" class="form-control"
                                                            value="{{ $kriteria->id_kriteria }}">

                                                        <select class="form-control" name="id_nilai[]" required>
                                                            <option value="">Pilih</option>
                                                            @forelse ($kriteria->sub_kriterias as $sub)
                                                                <option value="{{ $sub->nilai['id_nilai'] }}">
                                                                    {{ $sub->nama }}</option>
                                                            @empty
                                                                <option value="">Nilai masih kosong</option>
                                                            @endforelse
                                                        </select>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2">Belum ada kriteria</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" id="batal" class="btn btn-danger">Batal</button>
                                </div>
                            </form>
                        </div>
                        <div class="card" id="formubah">
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Sub Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="" id="formupdate">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Pakan</label>
                                                <input type="text" name="nama_data" id="nama_data" required
                                                    class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Protein</label>
                                                <input type="number" name="protein" step="0.1" id="protein"
                                                    required class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Air</label>
                                                <input type="number" name="air" id="air" required class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" name="harga" id="harga" required
                                                    class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group">
                                                <label>Lemak</label>
                                                <input type="text" name="lemak" id="lemak" required
                                                    class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" name="id_kategori"
                                                    id="id_kategori">
                                                    <option value="" selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-center">Penilaian</h6>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            @if (count($kriterias) > 0)
                                                @foreach ($kriterias as $kriteria)
                                                    <tr>
                                                        <td>{{ $kriteria->nama }}</td>
                                                        <td>
                                                            <input type="hidden" name="id_kriteria[]" class="form-control"
                                                                value="{{ $kriteria->id_kriteria }}">

                                                            <select
                                                                class="form-control data-kr{{ $kriteria->id_kriteria }}"
                                                                name="id_nilai[]" required id="id_nilai">
                                                                <option value="">Pilih</option>
                                                                @forelse ($kriteria->sub_kriterias as $sub)
                                                                    <option value="{{ $sub->nilai['id_nilai'] }}">
                                                                        {{ $sub->nama }}</option>
                                                                @empty
                                                                    <option value="">Nilai masih kosong</option>
                                                                @endforelse
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="2">Belum ada kriteria</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
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
        function ubah(data, kriteria, nilai, kategori) {
            var datakriteria = data.alternatif.nilai_alternatif;
            // datacreate.id = data.id_kategori;
            // datacreate.nama = data.nama;
            var c = data.alternatif.id_kategori;
            var nar = data.alternatif.nilai_alternatifs;
            // var nsk = data.nilai_sub_kriterias;
            $("#formubah").css("display", "block");
            $("#tabeldata").css("display", "none");
            // $("#namakategori").val(data.nama);
            $('#nama_data').val(data.nama_data);
            $('#harga').val(data.harga);
            $('#lemak').val(data.lemak);
            $('#protein').val(data.protein);
            $('#air').val(data.air);
            // $("#ubahh").css("display", "unset");
            // $("#simpann").css("display", "none");
            $('#id_kategori option:selected').val(data.alternatif.kategori.id_kategori);
            $('#id_kategori option:selected').text(data.alternatif.kategori.nama);

            for (let x = 0; x < kategori.length; x++) {
                $('#id_kategori').append('<option value="' + kategori[x].id_kategori + '">' + kategori[x]
                    .nama + '</option>');
            }

            $("#formupdate").attr('action', "{{ url('/admin/update') }}" + "/" + data.id_data)

            @foreach ($kriterias as $item)
                for (let index = 0; index < datakriteria.length; index++) {
                    if(datakriteria[index].id_kriteria=="{{ $item->id_kriteria }}" ){
                    $('.data-kr'+datakriteria[index].id_kriteria).val(datakriteria[index].nilai.id_nilai); } } @endforeach;


        }
        $(document).ready(function() {
            $("#formtambah").css("display", "none");
            $("#formubah").css("display", "none");
            $('#tambah').click(function() {
                $("#formtambah").css("display", "block");
                $("#tabeldata").css("display", "none");
            });

            $('#batal').click(function() {
                $("#formtambah").css("display", "none");
                $("#tabeldata").css("display", "block");
            });
            $('#batalubah').click(function() {
                $("#formubah").css("display", "none");
                $("#tabeldata").css("display", "block");
                ubah().stop();
            });
        })
    </script>
@endpush
