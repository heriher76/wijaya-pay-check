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
                        <label for="nrp">NIP</label>
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
                        <label for="formGroupExampleInput">Status</label>
                        <select name="pangkat" id="pangkat" class="form-control">
                            <option>--Pilih Status--</option>
                            <option value="Kepala Wilayah">Kepala Wilayah</option>
                            <option value="Anggota Wilayah">Anggota Wilayah</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        {{-- <label for="formGroupExampleInput">Jabatan</label> --}}
                        <input type="hidden" name="jabatan" class="form-control" id="formGroupExampleInput" placeholder="Jabatan">
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
                        <label for="exampleInputPassword1">Pilih Lokasi</label>
                        <div id="map"></div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="formGroupExampleInput">Latitude</label>
                    </div> --}}
                    <input type="hidden" name="lat" class="form-control" id="latInput" value="-6.914270" placeholder="Koordinat latitude">
                    {{-- <div class="form-group">
                        <label for="formGroupExampleInput">Longitude</label>
                    </div> --}}
                    <input type="hidden" name="long" class="form-control" id="lngInput" value="107.620390" placeholder="Koordinat Longitude">
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPx02inVenk0bE7hU-cjtWlZpIrF8tDsQ&callback=initMap&v=weekly"
    defer
></script>
<script>
function initMap() {
  const myLatlng = { lat: -6.921685, lng: 107.607142 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatlng,
  });
  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: "Klik map untuk mendapatkan Lat/Lng!",
    position: myLatlng,
  });

  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    );
    infoWindow.open(map);
    document.getElementById('latInput').value = mapsMouseEvent.latLng.lat();
    document.getElementById('lngInput').value = mapsMouseEvent.latLng.lng();
  });
}

window.initMap = initMap;
</script>
<style>
    #map {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
    }
</style>
@endsection
