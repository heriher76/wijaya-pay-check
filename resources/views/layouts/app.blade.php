<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="description" content="AdminLTE with Laravel 5.7, adminlte with laravel 5.7, Laravel 5.7 adminlte configuration, AdminLTE 3 with Laravel 5.7, adminlte 3 with laravel 5.7, Laravel 5.7 adminlte 3 configuration, Laravel 5.7 adminlte 3, Laravel 5.7 adminlte-3, AdminLTE-3 with Laravel 5.7, adminlte-3 with laravel 5.7, Laravel 5.7 adminlte-3 configuration, Laravel, Laravel 5.7, adminlte, adminlte 3, adminlte-3, AdminLTE with Laravel 5.7 2019, adminlte-3-laravel 5.7, Laravel 5.7-adminlte-configuration ">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wijaya Payment Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
    <div id="app">
        @auth
        <div class="wrapper">
            <!-- Navbar -->
            {{-- @include('layouts.partials._navbar') --}}

            <!-- Main Sidebar Container -->
            @include('layouts.partials._sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content area -->
                @yield('content')
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            {{-- <footer class="main-footer">
			    <!-- To the right -->
			    <div class="float-right d-none d-sm-inline">
			      Anything you want
			    </div>
			    <!-- Default to the left -->
			    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
			  </footer> --}}
        </div>
        @else
        @yield('content')
        @endauth
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    @yield('script')
</body>
</html>
