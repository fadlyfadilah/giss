@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        #map {
            height: 500px;
        }

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.kampanye.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.kampanyes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="nama_kampanye">{{ trans('cruds.kampanye.fields.nama_kampanye') }}</label>
                    <input class="form-control {{ $errors->has('nama_kampanye') ? 'is-invalid' : '' }}" type="text"
                        name="nama_kampanye" id="nama_kampanye" value="{{ old('nama_kampanye', '') }}" required>
                    @if ($errors->has('nama_kampanye'))
                        <span class="text-danger">{{ $errors->first('nama_kampanye') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.kampanye.fields.nama_kampanye_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="total">{{ trans('cruds.kampanye.fields.total') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number"
                            name="total" id="total" value="{{ old('total', '') }}" required>
                        @if ($errors->has('total'))
                            <span class="text-danger">{{ $errors->first('total') }}</span>
                        @endif
                    </div>
                    <span class="help-block">{{ trans('cruds.kampanye.fields.total_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <img id="previewImage" class="mb-2" src="#" width="100%" alt="">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label {{ $errors->has('image') ? 'is-invalid' : '' }}" for="customFile">Pilih Gambar</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.kampanye.fields.image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="deskripsi">{{ trans('cruds.kampanye.fields.deskripsi') }}</label>
                    <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                    @if ($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.kampanye.fields.deskripsi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lokasi">{{ trans('cruds.kampanye.fields.lokasi') }}</label>
                    <input class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" readonly type="text"
                        name="lokasi" id="lokasi" value="{{ old('lokasi', '') }}">
                    @if ($errors->has('lokasi'))
                        <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.kampanye.fields.lokasi_helper') }}</span>
                </div>
                <div id="map"></div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>

    // fungsi ini akan berjalan ketika akan menambahkan gambar dimana fungsi ini
    // akan membuat preview image sebelum kita simpan gambar tersebut.      
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Ketika tag input file denghan class image di klik akan menjalankan fungsi di atas
    $("#image").change(function() {
        readURL(this);
    });

    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl =
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA';

    var satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        dark = L.tileLayer(mbUrl, {
            id: 'mapbox/dark-v10',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });


    var map = L.map('map', {
        // titik koordinat disini kita dapatkan dari tabel centrepoint tepatnya dari field location
        // yang sebelumnya sudah kita tambahkan jadi lokasi map yang akan muncul  sesuai dengan tabel
        // centrepoint
        center: [{{ $centrepoint->location }}],
        zoom: 14,
        layers: [streets]
    });

    var baseLayers = {
        //"Grayscale": grayscale,
        "Streets": streets,
        "Satellite": satellite
    };

    var overlays = {
        "Streets": streets,
        "Satellite": satellite,
    };

    L.control.layers(baseLayers, overlays).addTo(map);

    // Begitu juga dengan curLocation titik koordinatnya dari tabel centrepoint
    // lalu kita masukkan curLocation tersebut ke dalam variabel marker untuk menampilkan marker
    // pada peta.

    var curLocation = [{{ $centrepoint->location }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });
    map.addLayer(marker);

    marker.on('dragend', function(event) {
        var location = marker.getLatLng();
        marker.setLatLng(location, {
            draggable: 'true',
        }).bindPopup(location).update();

        $('#lokasi').val(location.lat + "," + location.lng).keyup()
    });

    var loc = document.querySelector("[name=lokasi]");
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        loc.value = lat + "," + lng;
    });
</script>
@endsection