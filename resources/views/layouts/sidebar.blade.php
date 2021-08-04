<aside class="main-sidebar" style="background-color:#194d77;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    <img src="/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
    <span class="">SPK-BIBIT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="" class="d-block text-center ml-2" style="">
                @if (@Auth::user()->name)
                 Selamat Datang {{ Auth::user()->name }}
                @else
                    Silahkan Login
                @endif
            
            </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('kriteria.index') }}" class="nav-link">
                <i class="nav-icon fas fa-feather-alt"></i>
                <p>
                    Kelola Kriteria
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                <i class="nav-icon fas fa-grip-horizontal"></i>
                <p>
                    Kelola Kategori Bibit
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('data.index') }}" class="nav-link">
                <i class="nav-icon fas fa-cube"></i>
                <p>
                    Kelola Bibit
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('#') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    {{ __('Logout') }}
                </p>
                </a>
              <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            </ul>
        </nav>
    </div>
<!-- /.sidebar -->
</aside>