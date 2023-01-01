@extends('layouts.app')

@section('content')
<div class="content my-4">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <h4 class="m-0" style="padding:10px;text-align:center"> Data Laporan Petugas </h4>
            <div class="card-fluid">
                <div id="map"></div>
            </div>
            <!--FORM Input Lokasi -->
            <div class="card-header">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="max-width: 50vw !important;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Menampilkan Personil Terdekat -->
                        <h5 class="m-0" style="padding:10px;text-align:center"> Agen Terdekat </h5>
                        <table class="table table-hover">
                            <thead>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Pangkat </th>
                                <th> Perintah </th>
                            </thead>
                            <tbody id="personil">
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card-header">
                <!-- Menampilkan Personil Terdekat -->
                <h5 class="m-0" style="padding:10px;text-align:center"> List Laporan Petugas </h5>
                <table class="table table-hover">
                    <thead>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Tipe</th>
                        <th> Judul </th>
                        <th> No HP </th>
                        <th> Foto </th>
                        <th> Lat,Long</th>
                        <th> Perintah </th>
                    </thead>
                    <tbody>
                        @foreach($reports as $key => $report)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$report->nama}} </td>
                            <td> 
                              Petugas
                            </td>
                            <td> {{$report->judul}} </td>
                            <td> {{$report->no_hp}} </td>
                            <td> 
                                <a href="{{ url($report->foto ?? '') }}" target="_blank" class="btn btn-primary">Lihat Foto</a>
                            </td>
                            <td> {{$report->lat.', '.$report->long}}</td>
                            <td>
                                <input type="hidden" id="origin">
                                <input type="hidden" id="destination">
                                {{ csrf_field() }}
                                <button type="button" class="btn btn-primary" onclick="getLocation({{$report->lat}},{{$report->long}}, '{{$report->no_hp}}');"> Cari Agen Terdekat </button>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPx02inVenk0bE7hU-cjtWlZpIrF8tDsQ&callback=initMap" async type="text/javascript"
></script>

<script type="text/javascript">
    var directionsDisplay;
    var directionsService;
    var map;

    function getLocation(lat, long, nohp) {
        axios.post('{{ url('/api/getBestPositionController') }}', {
            latLong: lat+','+long,
            _token: document.getElementsByName("_token")[0].value
        })
        .then(function (response) {
            document.getElementById("origin").value = response.data.map[0].lat+","+response.data.map[0].long
            document.getElementById("destination").value = response.data.map[1].lat+","+response.data.map[1].long
            
            document.getElementById('personil').innerHTML = `<tr><td> 1 </td><td> ${response.data.personil.nama} </td><td> ${response.data.personil.jabatan} </td><td><a href='https://wa.me/${nohp}/?text=Halo, Silahkan Kontak Agen Terdekat Berikut Dengan NO HP = ${response.data.personil.no_hp}' target='_blank' class='btn btn-primary'> Pilih & Kirim Perintah Kepada Petugas </a></td></tr>`;

            calcRoute();          

            $('#exampleModal').modal('show');
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function initMap() {
        var agen_locations = @json($agen_locations);

        var petugas_locations = @json($petugas_locations);

        var center = new google.maps.LatLng({{$center[0]}}, {{$center[1]}});

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: {{$zoom}},
          center: center
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < agen_locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(agen_locations[i][1], agen_locations[i][2]),
            map: map,
            icon: { url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png" }
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(agen_locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }

        for (i = 0; i < petugas_locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(petugas_locations[i][1], petugas_locations[i][2]),
            map: map,
            icon: { url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png" }
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(petugas_locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }

      directionsService = new google.maps.DirectionsService;
      // var center = new google.maps.LatLng({{$center[0]}}, {{$center[1]}});
      // var map = new google.maps.Map(document.getElementById('map'), {
      //   zoom: {{$zoom}},
      //   center: center
      // });
      directionsDisplay = new google.maps.DirectionsRenderer({
        map: map
      });

      const onInputHandler = function () {
          calcRoute();
      };

      document
          .getElementById("origin")
          .addEventListener("change", onInputHandler);
    }

    function calcRoute() {
      var start = document.getElementById("origin").value;
      var end = document.getElementById("destination").value;
      var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
      };
      directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(result);
        }
      });
    };
</script>
@endsection