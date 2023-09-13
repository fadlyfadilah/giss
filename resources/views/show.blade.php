<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('cssw/style.css') }}">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
        integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    <title>Babakan Peutey Fondantion</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('logo.png') }}" alt="Logo" width="32px"> Web
                Gis</a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kampanye">Kampanye</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.donasi.index') }}">Donasi Saya</a>
                        </li>
                        <li class="ml-2 nav-item white">
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                        </li>
                    @else
                        <li class="ml-2 nav-item white">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="ml-2 nav-item white">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 justify-content-center">
        <div class="row">
            <div class="col-md-6 col-xs-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <p>
                        <h4><strong>Donasi Yang Dibutuhkan :</strong></h4>
                        <h5>Rp. {{ number_format($kampanye->total, 2, ',', '.') ?? '' }}</h5>
                        </p>

                        <p>
                        <h4><strong>Nama Kampanye :</strong></h4>
                        <h5>{{ $kampanye->nama_kampanye }}</h5>
                        </p>

                        <p>
                        <h4><strong>Keterangan Kampanye :</strong></h4>
                        <p>{{ $kampanye->deskripsi }}</p>
                        </p>

                        <p>
                        <h4>
                            <strong>Foto</strong>
                        </h4>
                        <img class="img-fluid" width="200" src="{{ $kampanye->getImage() }}" alt="">
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Kembali</a>
                        <button id="donateBtn" class="btn btn-outline-success">Donasi</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="row">
                    <div class="col-md-12 col-xs-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <div id="donationForm" style="display: none;" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Form Donasi
                            </div>
                            <div class="card-body">
                                <form action="{{ route('frontend.donasi.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="kampanye_id" value="{{ $kampanye->id }}">
                                    <div class="form-group mb-3">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="full_name"
                                            class="form-control @error('full_name') is-invalid @enderror"
                                            id="">
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="jumlah">Jumlah yang akan didonasi</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input
                                                class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}"
                                                type="number" name="jumlah" id="jumlah"
                                                max="{{ $kampanye->total }}" value="{{ old('jumlah', '') }}"
                                                required>
                                            @if ($errors->has('jumlah'))
                                                <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note (Optional)</label>
                                        <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                                        @if ($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <footer>
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2021 Copyright: Babakan Peutey Fondantion
            {{-- <a class="text-reset fw-bold" href="#"></a> --}}
        </div>
        <!-- Copyright -->
    </footer>
    
    <script>
        const donateBtn = document.getElementById('donateBtn');
        const donationForm = document.getElementById('donationForm');

        donateBtn.addEventListener('click', () => {
            if (donationForm.style.display === 'none') {
                donationForm.style.display = 'block';
            } else {
                donationForm.style.display = 'none';
            }
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
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


        var data{{ $kampanye->id }} = L.layerGroup()

        var map = L.map('map', {
            center: [{{ $kampanye->lokasi }}],
            zoom: 20,
            fullscreenControl: {
                pseudoFullscreen: false
            },
            layers: [streets, data{{ $kampanye->id }}]
        });

        var baseLayers = {
            "Streets": streets,
            "Satellite": satellite,
            "Dark": dark,
        };

        var overlays = {
            //"Streets": streets
            "{{ $kampanye->nama_kampanye }}": data{{ $kampanye->id }},
        };

        L.control.layers(baseLayers, overlays).addTo(map);


        var curLocation = [{{ $kampanye->lokasi }}];
        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'false',
        });
        map.addLayer(marker);
    </script>
</body>

</html>
