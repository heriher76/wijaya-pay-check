@extends('layouts.app')

@section('content')
<div class="content my-5">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h5 class="m-0"> Tambah Data Petugas Lapangan </h5>
                <!-- SEARCH FORM -->
                <form style="text-align: left" action="{{ url('/user_apps') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nrp') ? 'has-error' : ''}} ">
                        <label for="nrp">NRP</label>
                        <input class="form-control @if ($errors->has('nrp')) is-invalid @endif" type="text" id="nrp" name="nrp" value="{{ old('nrp') }}" placeholder="00000000" aria-describedby="emailHelp">
                        @if($errors->has('nrp'))
                        <span class="help-block">{{$errors->first('nrp')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}} ">
                        <label for="nama">Nama Lengkap</label>
                        <input class="form-control @if ($errors->has('nama')) is-invalid @endif" type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" aria-describedby="emailHelp">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pangkat</label>
                        <input type="text" name="pangkat" class="form-control" id="formGroupExampleInput" placeholder="Pangkat Personil">
                    </div>
                    <div class=" form-group">
                        <label for="formGroupExampleInput">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="formGroupExampleInput" placeholder="Jabatan peronil di kepolisian">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Handphone</label>
                        <input type="text" name="no_hp" class="form-control" id="formGroupExampleInput" placeholder="08xxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Foto Diri</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Foto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Latitude</label>
                        <input type="text" name="lat" class="form-control" id="formGroupExampleInput" placeholder="Koordinat latitude">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Longitude</label>
                        <input type="text" name="long" class="form-control" id="formGroupExampleInput" placeholder="Koordinat Longitude">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
