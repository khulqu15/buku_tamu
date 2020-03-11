
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>

    <nav class="navbar bg-white navbar-expand-sm navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="d-flex">
                <img src="{{ URL::asset('img/assets/img/ar-rifai_logo.png') }}" width="62px" height="60px" alt="">
                <div class="ml-3 mt-1 nav_name">
                    <h5 class="font-weight-bold mb-1">SMK MODERN AL - RIFA'IE</h5>
                    <h5 class="text-color">SISTEM INFORMASI BUKU TAMU DAN PEMINJAMAN</h5>
                </div>
            </div>
        </a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="text-color mr-2 font-weight-bold" href="#"><i class="fas fa-info-circle"></i> BANTUAN</a>
            </li>
        </ul>
    </nav>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
