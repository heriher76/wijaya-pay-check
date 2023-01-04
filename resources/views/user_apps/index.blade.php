@extends('layouts.app')


@section('content')
<div class="content my-4">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h3 class="m-0 TitleHead"> Data Petugas Lapangan </h5>

                    <!-- Alert Status add Personil -->
                    <div class="col-6">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <!-- SEARCH FORM -->
                    <div class="row">
                        <div class="col-sm-8">
                            <form class="form ml-3" action="{{ url('/user_apps') }}" method="GET" style="padding:1px; margin:12px">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 col-xs-6 d-flex flex-row-reverse d-flex align-items-center" onclick="##">
                            <a class="btn btn-primary float-right mt-2" href="{{ url('/user_apps/create') }}" role="button"> Tambah Petugas</a>
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>
                        </div>
                    </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> NAMA </th>
                        <th> STATUS </th>
                        <th> JABATAN </th>
                        <th> EMAIL </th>
                        <th> KOORDINAT LOKASI</th>
                        <th> ACTION </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataUP as $index => $d )
                    <tr>
                        <td>{{ $index+1}}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->pangkat}} </td>
                        <td>{{ $d->jabatan}}</td>
                        <td>{{ $d->email}}</td>
                        <td>{{ $d->lat}} , {{ $d->long}} </td>
                        <td>
                            <a href="{{ url('user_apps/'.$d->id) }}" class="btn btn-info">Edit</a>
                            |
                            <form action="{{ url('user_apps/'.$d->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Ini ?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

@if(\Session::has('success')) 
  <script type="text/javascript">
    swal({
        title: "Berhasil menambahkan data!",
        type: "info",
        showConfirmButton: false
    });
 </script>
@endif

@endsection
