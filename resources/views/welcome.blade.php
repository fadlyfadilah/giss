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

    <title>Web Donasi GIS</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"> Web Gis</a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#">Donasi Saya</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kampanye</a>
                    </li>
                    <li class="ml-2 nav-item white">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="ml-2 nav-item white">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
    </div>

    <div class="container">
        <h3 class="display-6">Lokasi Penerima</h3>
        <div class="owl-carousel owl-theme">
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="display-6">Donasi Yang Segera Membutuhkan</h3>
        <div class="owl-carousel owl-theme">
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
            <div class="card">
                <img class="card-img-top" src="icon/1.png" alt="Card image cap">
            </div>
        </div>
    </div>

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
</body>

</html>
