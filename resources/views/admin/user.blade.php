@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6" style="display: flex;align-items:center">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                <h1 class="m-0 text-dark">Kelola User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola User</li>
                </ol>
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
                      <h3 class="card-title">Tabel Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> &times;</span>
                                </button>{{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> &times;</span>
                                </button>
                                {{ Session::get('error') }}
                            </div>
                        @elseif (Session::has('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> &times;</span>
                                </button>
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <button type="button" class="btn btn-block btn-primary" style="width: 160px; margin-bottom:10px" id="tambah">Tambah User</button>
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" id="ubah{{ $item->id }}">Ubah</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default{{$item->id}}">
                                        Hapus
                                        </button>
                                        <div class="modal fade" id="modal-default{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Konfirmasi Penghapusan Data</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin Akan Menghapus {{ $item->name }} ?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
                      <h3 class="card-title">Form Tambah User</h3>
                    </div>
                    <form role="form" action="{{ route('user.store') }}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="form-group"> 
                          <label>Nama</label>
                          <input type="text" required name="name" class="form-control" placeholder="Contoh : Didi ">
                        </div>
                        <div class="form-group">
                          <label>E-Mail</label>
                          <input type="email" required name="email" class="form-control" placeholder="Contoh : didi@gmail.com">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" required name="password" class="form-control" placeholder="*******">
                        </div>
                        <div class="form-group">
                          <label>Ulangi Password</label>
                          <input type="password" required name="c_password" class="form-control" placeholder="*******">
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" id="batal" class="btn btn-danger">Batal</button>
                      </div>
                    </form>
                  </div>
                  <div class="card" id="formubah">
                    <div class="card-header">
                      <h3 class="card-title">Form Ubah User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="" method="POST" id="formupdate">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" required id="name" name="name" class="form-control" placeholder="Contoh : Didi ">
                            </div>
                            <div class="form-group">
                              <label>E-Mail</label>
                              <input type="email" required id="email" name="email" class="form-control" placeholder="Contoh : didi@gmail.com">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" required name="password" class="form-control" placeholder="*******">
                            </div>
                            <div class="form-group">
                              <label>Ulangi Password</label>
                              <input type="password" required name="c_password" class="form-control" placeholder="*******">
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
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
    $(document).ready(function(){
        $("#formtambah").css("display", "none");
        $("#formubah").css("display", "none");
        $('#tambah').click(function(){
            $("#formtambah").css("display", "block");
            $("#tabeldata").css("display", "none");
        });
        @foreach($user as $item)
            $('#ubah{{ $item->id }}').click(function(){

                $("#formubah").css("display", "block");
                $('#name').val('{{ $item->name }}');
                $('#email').val('{{ $item->email }}');
                $('#formupdate').attr('action', '{{ route('user.update', $item->id) }}');
                $("#tabeldata").css("display", "none");
            });
        @endforeach
        $('#batal').click(function(){
            $("#formtambah").css("display", "none");
            $("#tabeldata").css("display", "block");
        });
        $('#batalubah').click(function(){
            $("#formubah").css("display", "none");
            $("#tabeldata").css("display", "block");
        });
    })
  </script>
@endpush