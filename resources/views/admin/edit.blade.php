@extends('layouts.app')

@section('content')
<div class="content my-5">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h5 class="m-0"> Edit Data Admin </h5>
                <!-- SEARCH FORM -->
                <form style="text-align: left" action="{{ url('/admins/'.$user->id) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group{{$errors->has('nrp') ? 'has-error' : ''}} ">
                        <label for="nrp">NIP</label>
                        <input class="form-control @if ($errors->has('nrp')) is-invalid @endif" type="text" id="nrp" name="nrp"placeholder="00000000" aria-describedby="emailHelp" value="{{$user->nrp}}">
                        @if($errors->has('nrp'))
                        <span class="help-block">{{$errors->first('nrp')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}} ">
                        <label for="nama">Nama Lengkap</label>
                        <input class="form-control @if ($errors->has('nama')) is-invalid @endif" type="text" id="nama" name="nama" placeholder="Nama Lengkap" aria-describedby="emailHelp" value="{{$user->nama}}">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email" value="{{$user->email}}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ubah Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
