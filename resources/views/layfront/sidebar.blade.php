<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" style="display: flex;justify-content:space-between;align-items:center">
        <div class="row">
            <div class="col-md-2">
                <img src="/img/Logo.png" alt="AdminLTE Logo" class="mx-auto d-block brand-image img-circle elevation-3"
                    style="opacity: .8">
            </div>
            <div class="col-md-6">
                <p style="font-size: 14px" href="#" class="text-white fs-6">Selamat Datang <br /> Di PT. ANAK BUMI PADJAJARAN</p>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('front.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('katalog') }}" class="nav-link">
                        <i class="nav-icon fas fa-grip-horizontal"></i>
                        <p>
                            Daftar Pakan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cari.alt') }}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Cari Alternatif Pakan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
