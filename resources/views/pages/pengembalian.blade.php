<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpan Pinjam</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>

    @if (session('error'))
        <div class="alert alert-danger position-relative w-100" style="top: 0; left: 0;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success position-relative w-100" style="top: 0; left: 0;">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="my-5">
                    <h5>Pengembalian barang</h5>
                    <form action="{{ url('/pengembalian/search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-9 pt-3">
                            <div class="form-group">
                                <label for="search">Cari kode transaksi untuk mengembalikan barang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-light">
                                        <div class="input-group-text bg-light" id="view"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Kode transaksi (XXXXX-XXXXX)">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success w-100 mt-0 mt-md-5">Cari</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <p>Atau anda ingin Mengembalikan barang ?</p>
                <a class="btn btn-primary w-50" href="{{ url('/simpan_pinjam') }}" role="button">Peminjaman</a>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>

</body>
</html>
