@extends('layouts.app')

@section('content')
<div class="content my-5">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h5 class="m-0"> Edit Data Petugas Lapangan </h5>
                <!-- SEARCH FORM -->
                <form style="text-align: left" action="{{ url('/user_apps/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group{{$errors->has('nrp') ? 'has-error' : ''}} ">
                        <label for="nrp">NIP</label>
                        <input class="form-control @if ($errors->has('nrp')) is-invalid @endif" type="text" id="nrp" name="nrp" value="{{ $user->nrp }}" placeholder="00000000" aria-describedby="emailHelp">
                        @if($errors->has('nrp'))
                        <span class="help-block">{{$errors->first('nrp')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}} ">
                        <label for="nama">Nama Lengkap</label>
                        <input class="form-control @if ($errors->has('nama')) is-invalid @endif" type="text" id="nama" name="nama" value="{{ $user->nama }}" placeholder="Nama Lengkap" aria-describedby="emailHelp">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Status</label>
                        <select name="pangkat" id="pangkat" class="form-control">
                            <option>--Pilih Status--</option>
                            <option value="Kepala Wilayah" @if($user->pangkat == 'Kepala Wilayah') selected @endif>Kepala Wilayah</option>
                            <option value="Anggota Wilayah" @if($user->pangkat == 'Anggota Wilayah') selected @endif>Anggota Wilayah</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        {{-- <label for="formGroupExampleInput">Jabatan</label> --}}
                        <input type="hidden" value="{{ $user->jabatan }}" name="jabatan" class="form-control" id="formGroupExampleInput" placeholder="Jabatan" >
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Handphone</label>
                        <input type="text" value="{{ $user->no_hp }}" name="no_hp" class="form-control" id="formGroupExampleInput" placeholder="08xxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Foto Diri <i>*upload gambar baru untuk mengubah</i></label>
                        @if(!empty($user->image))
                        <br>
                        <img src="{{ url('img/personil/'.$user->image) }}" style="width: 100px; height: 100px;">
                        @endif
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Foto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Latitude</label>
                        <input type="text" value="{{ $user->lat }}" name="lat" class="form-control" id="formGroupExampleInput" placeholder="Koordinat latitude">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Longitude</label>
                        <input type="text" value="{{ $user->long }}" name="long" class="form-control" id="formGroupExampleInput" placeholder="Koordinat Longitude">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ubah Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password Baru">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
