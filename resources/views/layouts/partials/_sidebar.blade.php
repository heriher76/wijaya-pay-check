<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Wijaya Payment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{Route('laporan')}}" class="nav-link">
                        <i class="nav-icon fa fa-bell"></i>
                        <p> Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('laporan_darurat')}}" class="nav-link">
                        <i class="nav-icon fa fa-warning"></i>
                        <p> Laporan Darurat </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{Route('laporan_masyarakat')}}" class="nav-link">
                        <i class="nav-icon fa fa-info"></i>
                        <p> Laporan Agen </p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="{{Route('news')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p> Berita </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{Route('user_apps')}}" class="nav-link">
                        <i class="nav-icon fa fa-star"></i>
                        <p> Petugas Lapangan </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('masyarakat')}}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p> Agen </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('admin-index')}}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p> Admin </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{Route('user-baru')}}" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p> Agen Baru </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <form action="{{Route('logout')}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="nav-link form-control"><i class="nav-icon fa fa-sign-out"></i>
                            <p> Logout </p></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
