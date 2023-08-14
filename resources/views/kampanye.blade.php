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
    <title>Web Donasi GIS</title>
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
    
    
    <div class="container mb-5">
        <h3 class="display-6">Daftar Kampanye</h3>
        @foreach ($kampanyes as $kampanye)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ $kampanye->getImage() }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $kampanye->nama_kampanye }}</h5>
                    <p class="card-text">{{ Str::limit($kampanye->deskripsi, 100, '...') }}</p>
                    <a href="{{ route('kampanye.show', $kampanye->slug) }}" class="btn btn-primary">Lebih Lanjut</a>
                </div>
            </div>
        @endforeach
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <footer>
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2021 Copyright: Web Donasi GIS
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
</body>

</html>
