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
    <!-- Owlcarousel -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
        integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>

    {{-- cdn leaflet search --}}
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.9/leaflet-search.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.9/leaflet-search.src.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        #map {
            height: 500px;
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

    <div class="jumbotron jumbotron-fluid">
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12 rounded-lg" style="background-color: #dbdbdb">
                <p class="text-center h2 my-5">Allah said: "Spend on charity, O son of Adam, and i will spend on you"
                </p>
                <p class="text-center h2 my-5">[ Sahih al-bukhari #5352 ]</p>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="display-6">Lokasi Penerima Donasi</h3>
        <div id="map"></div>
    </div>

    <div class="container mb-4">
        <h3 class="display-6">Donasi Yang Segera Membutuhkan</h3>
        <div class="owl-carousel owl-theme">
            @foreach ($kampanyes as $kampanye)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $kampanye->getImage() }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kampanye->nama_kampanye }}</h5>
                        <p class="card-text">{{ Str::limit($kampanye->deskripsi, 100, '...') }}</p>
                        <p class="card-text">Rp. {{ number_format($kampanye->donasis->sum('jumlah'), 2, ',', '.') ?? '' }} / Rp. {{ number_format($kampanye->total, 2, ',', '.') ?? '' }}</p>
                        <a href="{{ route('kampanye.show', $kampanye->slug) }}" class="btn btn-primary">Lebih Lanjut</a>
                    </div>
                </div>
            @endforeach
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('jsw/jquery.js') }}"></script>
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

        var map = L.map('map', {

            center: [{{ $koordinat->location }}],
            zoom: 11,
            layers: [streets]
        });

        var baseLayers = {
            "Grayscale": dark,
            "Satellite": satellite,
            "Streets": streets
        };

        var overlays = {
            "Streets": streets,
            "Grayscale": dark,
            "Satellite": satellite,
        };

        // Menampilkan popup data ketika marker di klik 
        // @foreach ($kampanyes as $item)
        //     L.marker([{{ $item->location }}])
        //         .bindPopup(
        //             "<div class='my-2'><img src='{{ $item->getImage() }}' class='img-fluid' width='700px'></div>" +
        //             "<div class='my-2'><strong>Nama Space:</strong> <br>{{ $item->nama_kampanye }}</div>" +
        //             "<div><a href='#' class='btn btn-outline-info btn-sm'>Detail Space</a></div>" +
        //             "<div class='my-2'></div>"
        //         ).addTo(map);
        // @endforeach

        var datas = [
            @foreach ($kampanyes as $key => $value)
                {
                    "loc": [{{ $value->lokasi }}],
                    "title": '{!! $value->nama_kampanye !!}'
                },
            @endforeach
        ];

        // pada koding ini kita menambahkan control pencarian data        
        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);
        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 17,
            markerLocation: true
        })


        //menambahkan variabel controlsearch pada addControl
        map.addControl(controlSearch);

        // looping variabel datas utuk menampilkan data space ketika melakukan pencarian data
        for (i in datas) {

            var title = datas[i].title,
                loc = datas[i].loc,
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                });
            markersLayer.addLayer(marker);

            // melakukan looping data untuk memunculkan popup dari space yang dipilih
            @foreach ($kampanyes as $item)
                L.marker([{{ $item->lokasi }}])
                    .bindPopup(
                        "<div class='my-2'><img src='{{ $item->getImage() }}' class='img-fluid' width='700px'></div>" +
                        "<div class='my-2'><strong>Nama Kampanye:</strong> <br>{{ $item->nama_kampanye }}</div>" +
                        "<a href='{{ route('kampanye.show', $item->slug) }}' class='btn btn-outline-info btn-sm'>Detail Kampanye</a></div>" +
                        "<div class='my-2'></div>"
                    ).addTo(map);
            @endforeach
        }
        L.control.layers(baseLayers, overlays).addTo(map);
    </script>
</body>

</html>
