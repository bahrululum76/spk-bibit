@extends('layfront.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="display: flex;align-items:center">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $jr }}
                                    {{-- <sup style="font-size: 20px">%</sup> --}}
                                </h3>
                                <h4>Pakan</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-fw fa-box"></i>
                            </div>
                            <a href="{{ route('katalog') }}" class="small-box-footer">Lihat <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>&nbsp;</h3>

                                <h4>Cari Alternatif Pakan</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                            <a href="{{ route('cari.alt') }}" class="small-box-footer">Cari <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row" style="min-height: 500px">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Peringkat Terbaik</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Protein</th>
                                            <th>Lemak</th>
                                            <th>Air</th>
                                            <th class="text-center">Peringkat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>

                                                <td>{{ $item->data->nama_data }}</td>
                                                <td>
                                                    Rp. {{ $item->data->harga }}
                                                </td>
                                                <td>
                                                    {{ $item->data->protein }}%
                                                </td>
                                                <td>
                                                    {{ $item->data->lemak }}%
                                                </td>
                                                <td>
                                                    {{ $item->data->air }}%
                                                </td>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
