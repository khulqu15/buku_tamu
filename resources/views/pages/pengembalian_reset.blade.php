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

    @include('pages.nav.navbar')

    <div class="container pt-5 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Peminjaman {{ $inventaris->name }}</h3>
                <div class="row">
                    <div class="col-md-8">
                    <form action="{{ url('pinjam/barang/'.$inventaris->id.'/transaksi/'.$transaksi->kode_transaksi.'/update') }}" method="post">
                        {{ csrf_field() }}
                       <strong>Nama barang : {{ $inventaris->name }}</strong>

                       <div class="form-group">
                           <label for="nama_peminjam">Nama Peminjam</label>
                           <input type="text" name="nama_peminjam" required id="nama_peminjam" disabled class="form-control" value="{{ $transaksi->nama_peminjam }}"/>
                       </div>
                       <div class="form-group">
                           <label for="phone_peminjam">Telp Peminjam</label>
                           <input type="text" name="phone_peminjam" required id="phone_peminjam" disabled class="form-control" value="{{ $transaksi->phone_peminjam }}"/>
                       </div>
                       <div class="form-group">
                           <label for="alamat">Alamat Peminjam</label>
                           <input type="text" name="alamat" required id="alamat" disabled class="form-control" value="{{ $transaksi->alamat }}"/>
                       </div>
                       <div class="form-group">
                           <label for="jumlah">Jumlah yang dipinjam</label>
                           <input type="text" name="jumlah" required id="jumlah" disabled class="form-control" value="{{ $transaksi->jumlah }}"/>
                       </div>
                       {{-- <div class="text-right">
                           <a target="_blank" class="btn btn-primary px-5" href="{{ url('/transaksi/'.$transaksi->kode_transaksi.'/pdf') }}" role="button">Print</a>
                           <a class="btn btn-primary px-5" href="{{ url('/simpan_pinjam') }}" role="button">Kembali</a>
                       </div> --}}
                       <div class="row mb-5">
                           <div class="col-sm-6">
                               <button type="button" class="btn btn-success w-100" id="reset">Reset</button>
                           </div>
                           <div class="col-sm-6">
                               <button type="submit" class="btn btn-primary w-100" id="submit">Submit</button>
                           </div>
                       </div>
                    </form>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div class="position-sticky" style="top: 100px">
                            <img src="{{ URL::asset('webcam/transaksi/'.$transaksi->foto) }}" class="rounded mb-4" width="100%" alt="">
                            <a class="btn btn-success w-100" href="{{ url('/pinjam/barang/'.$inventaris->id.'/'.$transaksi->kode_transaksi.'/foto') }}" role="button">Ganti foto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>

    <script>
        $('#reset').click(function() {
            $('input').removeAttr('disabled');
        });
        $('#submit').click(function() {
            $('input').removeAttr('disabled');
        });
    </script>

</body>
</html>
