<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Fitur</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>
    <div class="container mt-5 pt-5">
        <a target="blank" class="btn btn-primary position-fixed btn-sm" style="top: 10px; right: 10px" href="{{ url('/login') }}" role="button">Login</a>
        <div class="row pt-5 mt-5">
            <div class="col-6 pt-5 mt-5">
            <a class="btn btn-primary w-100" href="{{ url('/buku_tamu') }}" role="button">Buku Tamu</a>
            </div>
            <div class="col-6 pt-5 mt-5">
                <a class="btn btn-success w-100" href="{{ url('/simpan_pinjam') }}" role="button">Peminjaman</a>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
