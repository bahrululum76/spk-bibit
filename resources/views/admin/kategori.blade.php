@extends('layouts.layout')
@section('content')
    <?php
    $jumlah = count($kriteria);
    $arr = $kriteria;
    $ir = 0.0;
    foreach ($irdata as $irk => $irv) {
        if ($irk == $jumlah) {
            $ir = $irv;
        }
    }
    $njumlah = count($kriteria);
    $narr = $nilaidb;
    $nir = 0.0;
    foreach ($irdata as $irk => $irv) {
        if ($irk == $njumlah) {
            $nir = $irv;
        }
    }
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Kategori Kategori Pakan</h1>
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
                                <h3 class="card-title">Tabel Data Kategori Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <button type="button" style="margin-bottom:5px" class="btn btn-sm btn-primary"
                                        onclick="tambah({{ $kriteria }},{{ $nilaidb }});">Tambah Kategori
                                        Pakan</button>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <button type="button" id="ubah" class="btn btn-sm btn-warning"
                                                        onclick="ubah({{ $item }},{{ $kriteria }},{{ $nilaidb }});">Ubah</button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-default{{ $item->id_kategori }}">
                                                        Hapus
                                                    </button>
                                                    <div class="modal fade"
                                                        id="modal-default{{ $item->id_kategori }}">
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
                                                                        action="{{ route('kategori.destroy', $item->id_kategori) }}"
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
                                <h3 class="card-title" id="formtitle">Form Tambah Kategori Pakan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="myform">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kategori Pakan</label>
                                        <input type="text" required class="form-control" id="namakategori"
                                            placeholder="Masukan Nama Katgori Pakan">
                                    </div>
                                </div>
                                <h5 class="text-center">Matriks Perbandingan Kriteria Berpasangan</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                @foreach ($kriteria as $item)
                                                    <th>{{ $item->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kriteria as $key => $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    @foreach ($kriteria as $k => $nilai)
                                                        @if ($key == $k)
                                                            <td><input type="number" readonly
                                                                    id="k{{ $key }}b{{ $k }}"
                                                                    value="1" required
                                                                    class="form-control kolom{{ $k }}"
                                                                    placeholder="1-9"></td>
                                                        @elseif($key > $k)
                                                            <td>
                                                                <select
                                                                    class="form-control inputnumberleft kolom{{ $k }}"
                                                                    id="k{{ $key }}b{{ $k }}"
                                                                    data-kolom="{{ $key }}"
                                                                    data-target="k{{ $k }}b{{ $key }}">
                                                                    @foreach ($nkdata as $nk)
                                                                        <option value="{{ $nk }}">
                                                                            {{ $nk }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <select
                                                                    class="form-control inputnumberright kolom{{ $k }}"
                                                                    id="k{{ $key }}b{{ $k }}"
                                                                    data-kolom="{{ $key }}"
                                                                    data-target="k{{ $k }}b{{ $key }}">
                                                                    @foreach ($nkdata as $nk)
                                                                        <option value="{{ $nk }}">
                                                                            {{ $nk }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Jumlah</td>
                                                @for ($i = 0; $i < $jumlah; $i++)
                                                    <td><input type="text" id="total{{ $i }}"
                                                            class="form-control" value="0" title="total{{ $i }}"
                                                            readonly="" /></td>
                                                @endfor
                                            </tr>
                                        </tfoot>
                                    </table>
                                    {{-- <a href="javascript:;" onclick="showmatrix();" class="btn btn-info">Lihat Matriks</a> --}}
                                    <button type="button" style="margin-top: 5px" class="btn btn-primary float-right"
                                        data-toggle="modal" data-target="#modal-xl">
                                        Lihat Perhitungan
                                    </button>

                                </div>
                                <h5 class="text-center">Matriks Perbandingan Sub Kriteria</h5>
                                @foreach ($kriteria as $item)
                                    <h6 class="text-center" id="kriteria{{ $item->id_kriteria }}">Matriks Perbandingan
                                        Sub
                                        Kriteria Berpasangan {{ $item->nama }}</h6>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    @foreach ($nilaidb as $n)
                                                        <th>{{ $n->nama }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($nilaidb as $key => $n)
                                                    <tr>
                                                        <td>{{ $n->nama }}</td>
                                                        @foreach ($nilaidb as $k => $nn)
                                                            @if ($key == $k)
                                                                <td><input type="number" readonly
                                                                        id="k{{ $item->id_kriteria }}k{{ $key }}kb{{ $k }}"
                                                                        value="1" required
                                                                        class="form-control k{{ $item->id_kriteria }}kolom{{ $k }}"
                                                                        placeholder="1-9"></td>
                                                            @elseif($key > $k)
                                                                <td>
                                                                    <select
                                                                        class="form-control k{{ $item->id_kriteria }}inputnumberleft k{{ $item->id_kriteria }}kolom{{ $k }}"
                                                                        id="k{{ $item->id_kriteria }}k{{ $key }}kb{{ $k }}"
                                                                        data-k{{ $item->id_kriteria }}kolom="{{ $key }}"
                                                                        data-k{{ $item->id_kriteria }}target="k{{ $item->id_kriteria }}k{{ $k }}kb{{ $key }}">
                                                                        @foreach ($nkdata as $nk)
                                                                            <option value="{{ $nk }}">
                                                                                {{ $nk }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <select
                                                                        class="form-control k{{ $item->id_kriteria }}inputnumberright k{{ $item->id_kriteria }}kolom{{ $k }}"
                                                                        id="k{{ $item->id_kriteria }}k{{ $key }}kb{{ $k }}"
                                                                        data-k{{ $item->id_kriteria }}kolom="{{ $key }}"
                                                                        data-k{{ $item->id_kriteria }}target="k{{ $item->id_kriteria }}k{{ $k }}kb{{ $key }}">
                                                                        @foreach ($nkdata as $nk)
                                                                            <option value="{{ $nk }}">
                                                                                {{ $nk }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    @for ($i = 0; $i < $jumlah; $i++)
                                                        <td><input type="text"
                                                                id="k{{ $item->id_kriteria }}total{{ $i }}"
                                                                class="form-control" value="0"
                                                                title="k{{ $item->id_kriteria }}total{{ $i }}"
                                                                readonly="" /></td>
                                                    @endfor
                                                </tr>
                                            </tfoot>
                                        </table>
                                        {{-- <a href="javascript:;" onclick="showmatrix();" class="btn btn-info">Lihat Matriks</a> --}}
                                        <button type="button" style="margin-top: 5px" class="btn btn-primary float-right"
                                            data-toggle="modal" data-target="#modal-{{ $item->id_kriteria }}">
                                            Lihat Perhitungan
                                        </button>

                                    </div>
                                @endforeach

                                <div class="card-footer">
                                    <button type="button" id="simpann" onclick="simpan();"
                                        class="btn btn-success">Simpan</button>
                                    <button type="button" id="ubahh" onclick="update();"
                                        class="btn btn-primary">Ubah</button>
                                    <button type="button" id="batal" class="btn btn-secondary">Batal</button>
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
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Lihat Perhitungan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div id="matrikdiv" class="col-md-12" > --}}

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="<?= $jumlah + 3 ?>" class="text-center">Matrik Nilai Kriteria</th>
                            </thead>
                            <thead>
                                <th>Kriteria</th>
                                <?php
                foreach($arr as $k=>$v)
                {
                ?>
                                <th><?= $v->nama ?></th>
                                <?php
                }
                ?>
                                <th>Jumlah</th>
                                <th>Prioritas</th>
                            </thead>
                            <tbody>
                                <?php
                                $noUtama2 = 0;
                                foreach ($arr as $k2 => $v2) {
                                    echo '<tr>';
                                    echo '<td>' . $v2->nama . '</td>';
                                    $noSub2 = 0;
                                    for ($i = 0; $i < $jumlah; $i++) {
                                        echo '<td><input type="text" id="mn-k' . $noUtama2 . 'b' . $noSub2 . '" class="form-control" value="0" readonly=""/></td>';
                                        $noSub2 += 1;
                                    }
                                    echo '<td><input type="text" class="form-control" id="jml-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                                    echo '<td><input type="text" class="form-control" id="pri-b' . $noUtama2 . '" value="0" readonly=""/></td>';
                                    echo '</tr>';
                                    $noUtama2 += 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="{{ $jumlah + 2 }}" class="text-center">Matrik Penjumlahan Tiap Baris</th>
                            </thead>
                            <thead>
                                <th>Kriteria</th>
                                <?php
                foreach($arr as $k=>$v)
                {
                ?>
                                <th><?= $v->nama ?></th>
                                <?php
                }
                ?>
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                                <?php
                                $noUtama3 = 0;
                                foreach ($arr as $k3 => $v3) {
                                    echo '<tr>';
                                    echo '<td>' . $v3->nama . '</td>';
                                    $noSub3 = 0;
                                    for ($i = 1; $i <= $jumlah; $i++) {
                                        echo '<td><input type="text" id="mptb-k' . $noUtama3 . 'b' . $noSub3 . '" class="form-control" value="0" readonly=""/></td>';
                                        $noSub3 += 1;
                                    }
                                    echo '<td><input type="text" class="form-control" id="jmlmptb-b' . $noUtama3 . '" value="0" readonly=""/></td>';
                                    echo '</tr>';
                                    $noUtama3 += 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="4" class="text-center">Rasio Konsistensi</th>
                            </thead>
                            <thead>
                                <th>Kriteria</th>
                                <th>Jumlah Per Baris</th>
                                <th>Prioritas</th>
                                <th>Hasil</th>
                            </thead>
                            <tbody>
                                <?php
                                $noUtama4 = 0;
                                foreach ($arr as $k4 => $v4) {
                                    echo '<tr>';
                                    echo '<td>' . $v4->nama . '</td>';
                                    echo '<td><input type="text" class="form-control" id="jmlrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                    echo '<td><input type="text" class="form-control" id="priork-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                    echo '<td><input type="text" class="form-control" id="hasilrk-b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                    echo '</tr>';
                                    $noUtama4 += 1;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="center"><b>TOTAL</b></td>
                                    <td>
                                        <input type="text" class="form-control" id="totalrk" value="0" readonly="" />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="<?= $jumlah + 1 ?>" class="text-center">Hasil Perhitungan</th>
                            </thead>
                            <thead>
                                <th>Keterangan</th>
                                <th>Nilai</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>
                                        <input type="text" class="form-control" id="sumrk" value="0" readonly="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>n(Jumlah Kriteria)</td>
                                    <td>
                                        <input type="text" class="form-control" id="sumkriteria" value="<?= $jumlah ?>"
                                            readonly="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Maks(Jumlah/n)</td>
                                    <td>
                                        <input type="text" class="form-control" id="summaks" value="0" readonly="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>CI((Maks-n)/n-1)</td>
                                    <td>
                                        <input type="text" class="form-control" id="sumci" value="0" readonly="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>CR(CI/IR)</td>
                                    <td>
                                        <input type="text" class="form-control" id="sumcr" value="0" readonly="" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @foreach ($kriteria as $item)
        <div class="modal fade" id="modal-{{ $item->id_kriteria }}">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lihat Perhitungan {{ $item->nama }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <div id="matrikdiv" class="col-md-12" > --}}

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th colspan="<?= $njumlah + 3 ?>" class="text-center">Matrik Nilai Kriteria</th>
                                </thead>
                                <thead>
                                    <th>Kriteria</th>
                                    <?php
                foreach($narr as $k=>$v)
                {
                ?>
                                    <th><?= $v->nama ?></th>
                                    <?php
                }
                ?>
                                    <th>Jumlah</th>
                                    <th>Prioritas</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noUtama2 = 0;
                                    foreach ($narr as $k2 => $v2) {
                                        echo '<tr>';
                                        echo '<td>' . $v2->nama . '</td>';
                                        $noSub2 = 0;
                                        for ($i = 0; $i < $njumlah; $i++) {
                                            echo '<td><input type="text" id="mn-k' . $item->id_kriteria . 'k' . $noUtama2 . 'kb' . $noSub2 . '" class="form-control" value="0" readonly=""/></td>';
                                            $noSub2 += 1;
                                        }
                                        echo '<td><input type="text" class="form-control" id="jml-k' . $item->id_kriteria . 'b' . $noUtama2 . '" value="0" readonly=""/></td>';
                                        echo '<td><input type="text" class="form-control" id="pri-k' . $item->id_kriteria . 'b' . $noUtama2 . '" value="0" readonly=""/></td>';
                                        echo '</tr>';
                                        $noUtama2 += 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th colspan="{{ $njumlah + 2 }}" class="text-center">Matrik Penjumlahan Tiap Baris
                                    </th>
                                </thead>
                                <thead>
                                    <th>Kriteria</th>
                                    <?php
                foreach($narr as $k=>$v)
                {
                ?>
                                    <th><?= $v->nama ?></th>
                                    <?php
                }
                ?>
                                    <th>Jumlah</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noUtama3 = 0;
                                    foreach ($narr as $k3 => $v3) {
                                        echo '<tr>';
                                        echo '<td>' . $v3->nama . '</td>';
                                        $noSub3 = 0;
                                        for ($i = 1; $i <= $njumlah; $i++) {
                                            echo '<td><input type="text" id="mptb-k' . $item->id_kriteria . 'k' . $noUtama3 . 'kb' . $noSub3 . '" class="form-control" value="0" readonly=""/></td>';
                                            $noSub3 += 1;
                                        }
                                        echo '<td><input type="text" class="form-control" id="jmlmptb-k' . $item->id_kriteria . 'b' . $noUtama3 . '" value="0" readonly=""/></td>';
                                        echo '</tr>';
                                        $noUtama3 += 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th colspan="4" class="text-center">Rasio Konsistensi</th>
                                </thead>
                                <thead>
                                    <th>Kriteria</th>
                                    <th>Jumlah Per Baris</th>
                                    <th>Prioritas</th>
                                    <th>Hasil</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noUtama4 = 0;
                                    foreach ($narr as $k4 => $v4) {
                                        echo '<tr>';
                                        echo '<td>' . $v4->nama . '</td>';
                                        echo '<td><input type="text" class="form-control" id="jmlrk-k' . $item->id_kriteria . 'b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                        echo '<td><input type="text" class="form-control" id="priork-k' . $item->id_kriteria . 'b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                        echo '<td><input type="text" class="form-control" id="hasilrk-k' . $item->id_kriteria . 'b' . $noUtama4 . '" value="0" readonly=""/></td>';
                                        echo '</tr>';
                                        $noUtama4 += 1;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="center"><b>TOTAL</b></td>
                                        <td>
                                            <input type="text" class="form-control" id="totalrk{{ $item->id_kriteria }}k"
                                                value="0" readonly="" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th colspan="<?= $njumlah + 1 ?>" class="text-center">Hasil Perhitungan</th>
                                </thead>
                                <thead>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td>
                                            <input type="text" class="form-control" id="sumrk{{ $item->id_kriteria }}k"
                                                value="0" readonly="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>n(Jumlah Kriteria)</td>
                                        <td>
                                            <input type="text" class="form-control"
                                                id="sumkriteriak{{ $item->id_kriteria }}" value="<?= $njumlah ?>"
                                                readonly="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Maks(Jumlah/n)</td>
                                        <td>
                                            <input type="text" class="form-control" id="summaksk{{ $item->id_kriteria }}"
                                                value="0" readonly="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CI((Maks-n)/n-1)</td>
                                        <td>
                                            <input type="text" class="form-control" id="sumcik{{ $item->id_kriteria }}"
                                                value="0" readonly="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CR(CI/IR)</td>
                                        <td>
                                            <input type="text" class="form-control" id="sumcrk{{ $item->id_kriteria }}"
                                                value="0" readonly="" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- </div> --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        {{-- <button type="button" class="btn btn-primary" id="{{$item->id_kriteria}}">Simpan</button> --}}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach


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
    {{-- toast --}}
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
    <script>
        var datacreate = {
            id: '',
            nama: '',
            nilai_kriteria: [],
            nilai_sub_kriteria: [],
            hasil_sub_kriteria: []
        };
        $(document).ready(function() {


            @if (!empty($arr))
                hitungleft();
                hitungright();
            @endif

            @if (!empty($narr))
                @foreach ($kriteria as $item)
                    khitungleft("{{ $item->id_kriteria }}");
                    khitungright("{{ $item->id_kriteria }}");
                @endforeach
            @endif

            $("#formtambah").css("display", "none");

            $('#batal').click(function() {
                $("#formtambah").css("display", "none");
                $("#tabeldata").css("display", "block");
            });

            $(".inputnumberleft").each(function() {
                $(this).change(function() {
                    hitungleft();
                });
            });
            $(".inputnumberright").each(function() {
                $(this).change(function() {
                    hitungright();
                });
            });
            $("#namakategori").change(function() {
                var name = $("#namakategori").val();
                datacreate.nama = name;
            });
            @foreach ($kriteria as $item)
                $(".k{{ $item->id_kriteria }}inputnumberleft").each(function(){
                $(this).change(function(){
                khitungleft('{{ $item->id_kriteria }}');
                });
                });
                $(".k{{ $item->id_kriteria }}inputnumberright").each(function(){
                $(this).change(function(){
                khitungright('{{ $item->id_kriteria }}');
                });
                });
            @endforeach
        })

        function tambah(kriteria, nilai) {
            $("#formtambah").css("display", "block");
            $("#formtitle").text('Form Tambah Kategori Pakan');
            $("#tabeldata").css("display", "none");
            $("#ubahh").css("display", "none");
            $("#simpann").css("display", "unset");


            $("#namakategori").val('');

            for (let x = 0; x < kriteria.length; x++) {
                for (let y = 0; y < kriteria.length; y++) {
                    $("#k" + y + "b" + x).val(1);
                }
            };


            for (let kr = 0; kr < kriteria.length; kr++) {
                for (let xi = 0; xi < nilai.length; xi++) {
                    for (let yi = 0; yi < nilai.length; yi++) {

                        $("#k" + kriteria[kr].id_kriteria + "k" + yi + "kb" + xi).val(1);

                    };
                };
            };

            hitungright();
            hitungleft();
            @foreach ($kriteria as $item)
                khitungleft("{{ $item->id_kriteria }}");
                khitungright("{{ $item->id_kriteria }}");
            @endforeach
        }

        function ubah(data, kriteria, nilai) {
            datacreate.id = data.id_kategori;
            datacreate.nama = data.nama;
            var nk = data.nilai_kriterias;
            var nsk = data.nilai_sub_kriterias;
            $("#formtambah").css("display", "block");
            $("#formtitle").text('Form Ubah Kategori Pakan');
            $("#tabeldata").css("display", "none");
            $("#namakategori").val(data.nama);
            $("#ubahh").css("display", "unset");
            $("#simpann").css("display", "none");

            for (let x = 0; x < kriteria.length; x++) {
                for (let y = 0; y < kriteria.length; y++) {

                    for (let z = 0; z < nk.length; z++) {
                        if (kriteria[y].id_kriteria == nk[z].id_kriteria_dari && kriteria[x].id_kriteria == nk[z]
                            .id_kriteria_tujuan) {
                            $("#k" + y + "b" + x).val(nk[z].nilai);
                        }
                    }

                }
            };


            for (let kr = 0; kr < kriteria.length; kr++) {
                for (let xi = 0; xi < nilai.length; xi++) {
                    for (let yi = 0; yi < nilai.length; yi++) {

                        for (let zi = 0; zi < nsk.length; zi++) {
                            if (kriteria[kr].id_kriteria == nsk[zi].id_kriteria && nilai[yi].id_nilai == nsk[zi]
                                .sub_kriteria_dari.id_nilai && nilai[xi].id_nilai == nsk[zi].sub_kriteria_tujuan.id_nilai) {
                                $("#k" + kriteria[kr].id_kriteria + "k" + yi + "kb" + xi).val(nsk[zi].nilai);
                            }
                        }

                    };
                };
            };


            hitungright();
            hitungleft();
            @foreach ($kriteria as $item)
                khitungleft("{{ $item->id_kriteria }}");
                khitungright("{{ $item->id_kriteria }}");
            @endforeach
        }

        // rumus
        function hitungright() {
            $(".inputnumberright").each(function() {
                var dtarget = $(this).attr('data-target');
                var dkolom = $(this).attr('data-kolom');
                var jumlah = $(this).val();
                if (jumlah >= 1) {
                    rumus = 1 / parseFloat(jumlah);
                } else {
                    if (jumlah == 0.5) {
                        rumus = 2;
                    } else if (jumlah == 0.333) {
                        rumus = 3;
                    } else if (jumlah == 0.25) {
                        rumus = 4;
                    } else if (jumlah == 0.2) {
                        rumus = 5;
                    } else if (jumlah == 0.166) {
                        rumus = 6;
                    } else if (jumlah == 0.142) {
                        rumus = 7;
                    } else if (jumlah == 0.125) {
                        rumus = 8;
                    } else if (jumlah == 0.111) {
                        rumus = 9;
                    }
                }
                var fx = rumus.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#" + dtarget).val(fx);
                // console.log(fx)
                total();
                mnk();
                mptb();
                rk();
                getData();
                //alert(dkolom);
                //	});
            });
        }

        function hitungleft() {
            $(".inputnumberleft").each(function() {
                var dtarget = $(this).attr('data-target');
                var dkolom = $(this).attr('data-kolom');
                var jumlah = $(this).val();
                var rumus = 0;
                if (jumlah >= 1) {
                    rumus = 1 / parseFloat(jumlah);
                } else {
                    if (jumlah == 0.5) {
                        rumus = 2;
                    } else if (jumlah == 0.333) {
                        rumus = 3;
                    } else if (jumlah == 0.25) {
                        rumus = 4;
                    } else if (jumlah == 0.2) {
                        rumus = 5;
                    } else if (jumlah == 0.166) {
                        rumus = 6;
                    } else if (jumlah == 0.142) {
                        rumus = 7;
                    } else if (jumlah == 0.125) {
                        rumus = 8;
                    } else if (jumlah == 0.111) {
                        rumus = 9;
                    }
                }
                var fx = rumus.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#" + dtarget).val(fx);
                // console.log(fx)
                total();
                mnk();
                mptb();
                rk();
                getData();
                //alert(dkolom);
            });
        }

        function getData() {
            var id;
            var data = [];
            @foreach ($kriteria as $key => $item)
                @foreach ($kriteria as $k => $nilai)
                    // id="k{{ $key }}b{{ $k }}"
                    data.push({
                    'id_kriteria_dari' : "{{ $item->id_kriteria }}",
                    'id_kriteria_tujuan' : "{{ $nilai->id_kriteria }}",
                    'nilai' : $("#k{{ $key }}b{{ $k }}").val()
                    })
                @endforeach
            @endforeach
            datacreate.nilai_kriteria = data;
            // console.log(datacreate)
        }
        // function showmatrix()
        // {
        //   $("#matrikdiv").toggle('fade');
        // }
        function total() {
            for (i = 0; i < {{ $jumlah }}; i++) {
                var sum = 0;
                $(".kolom" + i).each(function() {
                    sum += parseFloat($(this).val());
                });
                var fx = sum.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#total" + i).val(fx);
            }
        }

        function mnk() {
            for (i = 0; i < {{ $jumlah }}; i++) {
                var jml = 0;
                for (x = 0; x < {{ $jumlah }}; x++) {
                    var vtarget = $("#k" + i + "b" + x).val();
                    var vkolom = $("#total" + x).val();
                    var rumus = parseFloat(vtarget) / parseFloat(vkolom);
                    var fx = rumus.toFixed(4);
                    jml += parseFloat(rumus);
                    $("#mn-k" + i + "b" + x).val(fx);
                    //$("#mn-k"+i+"b"+x).val(i+" "+x);						
                }
                var jumlahmnk = jml.toFixed(4);
                var prio = parseFloat(jml) / parseFloat({{ $jumlah }});
                var totprio = prio.toFixed(4);
                $("#jml-b" + i).val(jumlahmnk);
                $("#pri-b" + i).val(totprio);
            }
        }

        function mptb() {
            for (i = 0; i < {{ $jumlah }}; i++) {
                var jml = 0;
                for (x = 0; x < {{ $jumlah }}; x++) {
                    var prio = $("#pri-b" + x).val();
                    var nilai = $("#k" + i + "b" + x).val();
                    var rumus = parseFloat(nilai) * parseFloat(prio);
                    var fx = rumus.toFixed(4);
                    jml += parseFloat(rumus);
                    //$("#mptb-k"+i+"b"+x).val(prio+"*"+nilai);
                    $("#mptb-k" + i + "b" + x).val(fx);
                }
                var jumlahmnk = jml.toFixed(4);
                $("#jmlmptb-b" + i).val(jumlahmnk);
            }
        }

        function rk() {
            var total = 0;
            for (i = 0; i < {{ $jumlah }}; i++) {
                var prio = $("#pri-b" + i).val();
                var jml = $("#jmlmptb-b" + i).val();
                var hasil = parseFloat(jml) / parseFloat(prio);
                var fx = hasil.toFixed(4);
                total += hasil;
                $("#jmlrk-b" + i).val(jml);
                $("#priork-b" + i).val(prio);
                $("#hasilrk-b" + i).val(fx);
            }
            var fx2 = total.toFixed(4);
            $("#totalrk").val(fx2);
            $("#sumrk").val(fx2);
            var summaks = parseFloat(total) / parseFloat({{ $jumlah }});
            var fx_summaks = summaks.toFixed(4);
            $("#summaks").val(fx_summaks);

            var ci_r_1 = parseFloat(summaks) - parseFloat({{ $jumlah }});
            var jumci = parseFloat({{ $jumlah }}) - 1;
            var ci = parseFloat(ci_r_1) / jumci;
            var fx_ci = ci.toFixed(4);
            $("#sumci").val(fx_ci);
            var cr = parseFloat(ci) / parseFloat({{ $ir }});
            var fx_cr = cr.toFixed(4);
            $("#sumcr").val(fx_cr);
            $("#crvalue").val(fx_cr);
        }

        // for sub 
        // rumus
        function khitungright(kriteria) {
            $(".k" + kriteria + "inputnumberright").each(function() {
                var dtarget = $(this).attr('data-k' + kriteria + 'target');
                var dkolom = $(this).attr('data-k' + kriteria + 'kolom');
                var jumlah = $(this).val();
                if (jumlah >= 1) {
                    rumus = 1 / parseFloat(jumlah);
                } else {
                    if (jumlah == 0.5) {
                        rumus = 2;
                    } else if (jumlah == 0.333) {
                        rumus = 3;
                    } else if (jumlah == 0.25) {
                        rumus = 4;
                    } else if (jumlah == 0.2) {
                        rumus = 5;
                    } else if (jumlah == 0.166) {
                        rumus = 6;
                    } else if (jumlah == 0.142) {
                        rumus = 7;
                    } else if (jumlah == 0.125) {
                        rumus = 8;
                    } else if (jumlah == 0.111) {
                        rumus = 9;
                    }
                }
                var fx = rumus.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#" + dtarget).val(fx);
                // console.log(fx)
                ktotal(kriteria);
                kmnk(kriteria);
                kmptb(kriteria);
                krk(kriteria);
                getKData(kriteria);
                //alert(dkolom);
                //	});
            });
        }

        function khitungleft(kriteria) {
            $(".k" + kriteria + "inputnumberleft").each(function() {
                var dtarget = $(this).attr('data-k' + kriteria + 'target');
                var dkolom = $(this).attr('data-k' + kriteria + 'kolom');
                var jumlah = $(this).val();
                var rumus = 0;
                if (jumlah >= 1) {
                    rumus = 1 / parseFloat(jumlah);
                } else {
                    if (jumlah == 0.5) {
                        rumus = 2;
                    } else if (jumlah == 0.333) {
                        rumus = 3;
                    } else if (jumlah == 0.25) {
                        rumus = 4;
                    } else if (jumlah == 0.2) {
                        rumus = 5;
                    } else if (jumlah == 0.166) {
                        rumus = 6;
                    } else if (jumlah == 0.142) {
                        rumus = 7;
                    } else if (jumlah == 0.125) {
                        rumus = 8;
                    } else if (jumlah == 0.111) {
                        rumus = 9;
                    }
                }
                var fx = rumus.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#" + dtarget).val(fx);
                // console.log(fx)
                ktotal(kriteria);
                kmnk(kriteria);
                kmptb(kriteria);
                krk(kriteria);
                getKData(kriteria);
                //alert(dkolom);
            });
        }

        function getKData(kriteria) {
            var id;
            var move = datacreate.nilai_sub_kriteria;
            var movehasil = datacreate.hasil_sub_kriteria;
            var data = {
                id_kriteria: kriteria,
                data: []
            };
            var datahasil = {
                id_kriteria: kriteria,
                data: []
            };
            @foreach ($nilaidb as $key => $item)
                @foreach ($nilaidb as $k => $nilai)
                    // id="k{{ $key }}b{{ $k }}"
                    data.data.push({
                    'id_nilai_dari' : "{{ $item->id_nilai }}",
                    'id_nilai_tujuan' : "{{ $nilai->id_nilai }}",
                    'nilai' : $("#k"+kriteria+"k{{ $key }}kb{{ $k }}").val()
                    })
                @endforeach
            @endforeach
            datacreate.nilai_sub_kriteria = [];
            datacreate.hasil_sub_kriteria = [];
            move.map((x, y) => {
                if (x.id_kriteria != data.id_kriteria) {
                    datacreate.nilai_sub_kriteria.push(x)
                }
            })
            datacreate.nilai_sub_kriteria.push(data);

            @foreach ($nilaidb as $kkk => $nn)
                datahasil.data.push({
                id_nilai: "{{ $nn->id_nilai }}",
                prioritas: $("#pri-k"+kriteria+"b{{ $kkk }}").val()
                })
            @endforeach

            movehasil.map((x, y) => {
                if (x.id_kriteria != datahasil.id_kriteria) {
                    datacreate.hasil_sub_kriteria.push(x);
                }
            })
            datacreate.hasil_sub_kriteria.push(datahasil);

            // console.log(datacreate)

        }

        function simpan() {
            $("#simpann").prop('disabled', true);
            $("#batal").prop('disabled', true);
            $.ajax({
                url: "{{ route('kategori.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: datacreate,
                },
                success: function(response) {
                    if (response.status == 'berhasil') {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Berhasil',
                            body: 'Data Berhasil Disimpan.'
                        })
                        setTimeout(() => {
                            window.location.href = '/admin/kategori'
                        }, 1500);
                    } else {
                        $("#simpann").prop('disabled', false);
                        $("#batal").prop('disabled', false);
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Gagal',
                            body: 'Data Gagal Disimpan, Silahkan Coba Kembali.'
                        })
                    }
                },
            });
        }

        function update() {
            // console.log(datacreate.id)
            $("#ubahh").prop('disabled', true);
            $("#batal").prop('disabled', true);
            $.ajax({
                url: "{{ url('/admin/kategori/') }}" + "/" + datacreate.id,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: datacreate,
                },
                success: function(response) {
                    if (response.status == 'berhasil') {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Berhasil',
                            body: 'Data Berhasil Diubah.'
                        })
                        setTimeout(() => {
                            window.location.href = '/admin/kategori'
                        }, 1500);
                    } else {
                        $("#ubahh").prop('disabled', false);
                        $("#batal").prop('disabled', false);
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Gagal',
                            body: 'Data Gagal Diubah, Silahkan Coba Kembali.'
                        })
                    }
                },
            });
        }

        function ktotal(kriteria) {
            for (i = 0; i < {{ $njumlah }}; i++) {
                var sum = 0;
                $(".k" + kriteria + "kolom" + i).each(function() {
                    sum += parseFloat($(this).val());
                });
                var fx = sum.toString().match(/^-?\d+(?:\.\d{0,3})?/)[0];
                $("#k" + kriteria + "total" + i).val(fx);
            }
        }

        function kmnk(kriteria) {
            for (i = 0; i < {{ $njumlah }}; i++) {
                var jml = 0;
                for (x = 0; x < {{ $njumlah }}; x++) {
                    var vtarget = $("#k" + kriteria + "k" + i + "kb" + x).val();
                    var vkolom = $("#k" + kriteria + "total" + x).val();
                    var rumus = parseFloat(vtarget) / parseFloat(vkolom);
                    var fx = rumus.toFixed(4);
                    jml += parseFloat(rumus);
                    $("#mn-k" + kriteria + "k" + i + "kb" + x).val(fx);
                    //$("#mn-k"+i+"b"+x).val(i+" "+x);						
                }
                var jumlahmnk = jml.toFixed(4);
                var prio = parseFloat(jml) / parseFloat({{ $njumlah }});
                var totprio = prio.toFixed(4);
                $("#jml-k" + kriteria + "b" + i).val(jumlahmnk);
                $("#pri-k" + kriteria + "b" + i).val(totprio);
            }
        }

        function kmptb(kriteria) {
            for (i = 0; i < {{ $njumlah }}; i++) {
                var jml = 0;
                for (x = 0; x < {{ $njumlah }}; x++) {
                    var prio = $("#pri-k" + kriteria + "b" + x).val();
                    var nilai = $("#k" + kriteria + "k" + i + "kb" + x).val();
                    var rumus = parseFloat(nilai) * parseFloat(prio);
                    var fx = rumus.toFixed(4);
                    jml += parseFloat(rumus);
                    //$("#mptb-k"+i+"b"+x).val(prio+"*"+nilai);
                    $("#mptb-k" + kriteria + "k" + i + "kb" + x).val(fx);
                }
                var jumlahmnk = jml.toFixed(4);
                $("#jmlmptb-k" + kriteria + "b" + i).val(jumlahmnk);
            }
        }

        function krk(kriteria) {
            var total = 0;
            for (i = 0; i < {{ $njumlah }}; i++) {
                var prio = $("#pri-k" + kriteria + "b" + i).val();
                var jml = $("#jmlmptb-k" + kriteria + "b" + i).val();
                var hasil = parseFloat(jml) / parseFloat(prio);
                var fx = hasil.toFixed(4);
                total += hasil;
                $("#jmlrk-k" + kriteria + "b" + i).val(jml);
                $("#priork-k" + kriteria + "b" + i).val(prio);
                $("#hasilrk-k" + kriteria + "b" + i).val(fx);
            }
            var fx2 = total.toFixed(4);
            $("#totalrk" + kriteria + "k").val(fx2);
            $("#sumrk" + kriteria + "k").val(fx2);
            var summaks = parseFloat(total) / parseFloat({{ $njumlah }});
            var fx_summaks = summaks.toFixed(4);
            $("#summaksk" + kriteria).val(fx_summaks);

            var ci_r_1 = parseFloat(summaks) - parseFloat({{ $njumlah }});
            var jumci = parseFloat({{ $njumlah }}) - 1;
            var ci = parseFloat(ci_r_1) / jumci;
            var fx_ci = ci.toFixed(4);
            $("#sumcik" + kriteria).val(fx_ci);
            var cr = parseFloat(ci) / parseFloat({{ $nir }});
            var fx_cr = cr.toFixed(4);
            $("#sumcrk" + kriteria).val(fx_cr);
            $("#crvaluek" + kriteria).val(fx_cr);
        }
    </script>
@endpush
