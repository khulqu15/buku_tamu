<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Fitur</title>

    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">Ar Rifai - Sistem Informasi Buku Tamu dan Peminjaman</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a target="blank" class="btn btn-primary btn-sm mx-2" href="{{ url('/login') }}" role="button">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light btn-sm mx-2" href="#" role="button">Bantuan</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5 pt-5">
        <div class="row pt-5">
            <div class="col-6 pt-5 mt-5">
                <div class="p-5 shadow-sm text-center">
                    <i class="fas fa-book text-primary" style="font-size: 4rem"></i>
                    <a class="btn btn-primary w-100 mt-5" href="{{ url('/buku_tamu') }}" role="button">Buku Tamu</a>
                </div>
            </div>
            <div class="col-6 pt-5 mt-5">
                <div class="p-5 shadow-sm text-center">
                    <i class="fas fa-hands text-success" style="font-size: 4rem"></i>
                    <a class="btn btn-success w-100 mt-5" href="{{ url('/simpan_pinjam') }}" role="button">Peminjaman</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
