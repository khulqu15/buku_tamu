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
        <div class="alert alert-danger position-fixed w-100" style="top: 0; left: 0; z-index: 100;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success position-fixed w-100" style="top: 0; left: 0; z-index: 100;">
            {{ session('success') }}
        </div>
    @endif

    <div class="container pt-5 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Peminjaman {{ $inventaris->name }}</h3>
                <div class="row">
                    <div class="col-md-4 pt-4">
                        <div class="position-sticky" style="top: 100px">
                            <img src="{{ URL::asset('img/inventaris/'.$inventaris->foto) }}" width="100%" alt="">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                         </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">Nama Inventaris</label>
                                    <input type="text" disabled name="name" id="name" required class="form-control" value="{{ $inventaris->name }}">
                               </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" name="" id="" required class="form-control" value="{{ $inventaris->jumlah }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Deskripsi</label>
                            <textarea name="tujuan" required id="tujuan" disabled class="form-control" rows="4">{{ $inventaris->description }}</textarea>
                        </div>
                        @if($inventaris->jumlah == "0")
                        <div class="alert alert-danger" role="alert">
                            <strong>Kosong, Dipinjam semua</strong>
                        </div>
                        @else
                        <div class="alert alert-info" role="alert">
                            <strong>Ada, tersedia {{ $inventaris->jumlah }} barang</strong>
                        </div>
                        @endif
                        <div class="alert alert-success" role="alert">
                            <div class="mb-3">
                                <strong>Transaksi sukses, anda meminjam {{ $transaksi->jumlah }} Barang</strong>
                            </div>
                            <h2>Kode Transaski : <u>{{ $transaksi->kode_transaksi }}</u></h2>
                        </div>
                        <div class="text-right">
                        <a class="btn btn-primary px-5" href="{{ url('/kembali/barang/'.$inventaris->id.'/transaksi/'.$transaksi->kode_transaksi) }}" role="button">Kembalikan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>

</body>
</html>
