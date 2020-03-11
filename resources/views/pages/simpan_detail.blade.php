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

    @include('pages.nav.navbar')

    <div class="container pt-5 mt-4">
        <div class="row">
            <form action="{{ url('/pinjam/barang/'.$inventaris->id.'/'.$inventaris->kode_barang) }}" method="post">
            <div class="col-md-12">
                <h3>Peminjaman {{ $inventaris->name }}</h3>
                <div class="row">
                    <div class="col-md-8">
                            {{ csrf_field() }}
                            <div class="col-lg-12 mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" id="nama_peminjam" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone_peminjam">Nomor HP</label>
                                            <input type="text" name="phone_peminjam" id="phone_peminjam" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pengembalian">Pengembalian</label>
                                            <input type="date" name="pengembalian" id="pengembalian" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary px-5 mb-4 mt-2">Submit</button>
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
                                    <textarea name="tujuan" required id="tujuan" disabled class="form-control" rows="2">{{ $inventaris->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-4">
                            <div class="position-sticky" style="top: 100px">
                                <div class="w-100 bg-dark" style="height: 300px"></div>
                                <button type="submit" class="btn btn-success px-5 w-100 rounded-0">Ambil foto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>

</body>
</html>
