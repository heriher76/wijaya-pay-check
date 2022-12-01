@extends('layouts.app')


@section('content')
<div class="content my-5">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h5 class="m-0"> Data Admin </h5>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-1">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> CREATED AT</th>
                        <th> ACTION </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email}}</td>
                        <td>{{ $d->created_at->format('d/M/Y') }}</td>
                        <td>
                            <a href="#">Edit</a>
                            |
                            <a href="#">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
