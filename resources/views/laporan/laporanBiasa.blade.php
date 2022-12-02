@extends('layouts.app')

@section('content')
<div class="content my-4">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <h4 class="m-0" style="padding:10px;text-align:center"> Data Laporan  </h4>
            <div class="card-fluid">
                <div id="map"></div>
            </div>
            <!--FORM Input Lokasi -->
            <div class="card-header">
                <!-- Menampilkan Personil Terdekat -->
                <table class="table table-hover">
                    <thead>
                        <th> No </th>
                        <th> Nama Personil </th>
                        <th> Tipe</th>
                        <th> Judul </th>
                        <th> Isi </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        @foreach($reports as $key => $report)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$report->user->nama}} </td>
                            <td> 
                              @if($report->user->is_masyarakat)
                                Agen
                              @else
                                Petugas
                              @endif
                            </td>
                            <td> {{$report->judul}} </td>
                            <td> {{$report->isi}} </td>
                            <td> 
                                <a href="{{ url($report->foto ?? '') }}" target="_blank" class="btn btn-primary">Lihat Foto</a>
                                <a href="#" class="btn btn-success" onclick="initMap(parseFloat({{$report->user->lat}}), parseFloat({{$report->user->long}}));">Lokasi</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('style')
<style type="text/css">
    #map {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
    }
</style>
@endsection

@section('script')
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-eV05DYqYlJ8YKuSszRqYvYboNQNDjsc&callback=initMap&libraries=&v=weekly"
  async
></script>

<script type="text/javascript">
function initMap($lat, $long) {console.log($lat)
  const myLatLng = { lat: $lat, lng: $long };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: myLatLng,
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Posisi",
  });
}

</script>
@endsection

