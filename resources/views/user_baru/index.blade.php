@extends('layouts.app')


@section('content')
<div class="content my-4">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h3 class="m-0 TitleHead"> Data Personil Baru </h5>

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
                            <form class="form ml-3" action="{{ url('/user-baru') }}" method="GET" style="padding:1px; margin:12px">
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
                    </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> NRP </th>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> ACTION </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataUP as $index => $d )
                    <tr>
                        <td>{{ $index+1}}</td>
                        <td>{{ $d->nrp }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->email}}</td>
                        <td>
                            <form action="{{ url('user-baru/confirm/'.$d->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-xs" onclick="return confirm('Apakah Anda Ingin Konfirmasi Personil Ini ?');">Konfirmasi</button>
                            </form>
                            |
                            <form action="{{ url('user-baru/'.$d->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Personil Ini ?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
