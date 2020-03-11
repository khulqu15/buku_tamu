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
<body class="bg-home">

    @include('pages.nav.navbar')

    <div class="container-fluid position-relative h-100 bgo-color">
        <div class="position-absolute go_login">
            <a href="{{ url('/login') }}">
                <img src="{{ URL::asset('img/assets/icon/login.png') }}" width="90px" alt="">
             </a>
        </div>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-4 offset-md-1 py-5 my-5">
                    <div class="p-3 pt-5 pb-4 shadow-sm text-center choose_one_fitur bg-white rounded">
                        <a href="{{ url('/buku_tamu') }}">
                        <div class="position-relative" style="z-index: 10">
                            <img src="{{ URL::asset('img/assets/icon/book.png') }}" width="25%" alt="">
                            <div class="text-center mt-5">
                                <h4 class="font-weight-bold text-decoration-none text-dark">BUKU TAMU</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2 pt-5 my-5">
                    <div class="shadow-sm text-center py-4 choose_one_fitur bg-white rounded">
                        <a href="{{ url('/simpan_pinjam') }}">
                        <div class="row py-3 mx-3 my-2">
                            <div class="col-3">
                                <img src="{{ URL::asset('img/assets/icon/peminjaman.png') }}" width="100%" alt="">
                            </div>
                            <div class="col-9 mt-3 text-left">
                                <h4 class="font-weight-bold text-dark">PEMINJAMAN</h4>
                            </div>
                        </div>
                        </a>
                        <a href="{{ url('/pengembalian') }}">
                        <div class="row py-3 mx-3 my-1 border-top">
                            <div class="col-9 mt-3 text-left">
                                <h4 class="font-weight-bold text-dark">PENGEMBALIAN</h4>
                            </div>
                            <div class="col-3 text-center">
                                <img src="{{ URL::asset('img/assets/icon/pengembalian.png') }}" width="100%" alt="">
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
