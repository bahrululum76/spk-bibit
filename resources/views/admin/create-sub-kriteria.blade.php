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
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
