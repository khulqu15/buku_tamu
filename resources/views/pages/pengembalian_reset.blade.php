@extends('layouts.frontend')

@section('content')

@if (session('error'))
    <div class="alert alert-danger alert-dismissible message-top rounded-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible message-top rounded-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif


@include('layouts.navbars.mynav')
<div class="container-fluid px-0 bg-light">
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="font-weight-bold">FORM PEMINJAMAN BARANG</h3>
            <form action="{{ url('pinjam/barang/'.$inventaris->id.'/transaksi/'.$transaksi->kode_transaksi.'/update') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 pr-md-5">
                    <div class="pr-md-5 pr-0 mr-md-3 mr-0">
                        <div class="form-group">
                            <label for="nama_peminjam">Nama Barang</label>
                            <input type="text" name="nama_peminjam" required id="nama_peminjam" disabled class="form-control form-disabled" value="{{ $inventaris->name }}"/>
                        </div>

                        <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" required id="nama_peminjam" readonly class="form-control" value="{{ $transaksi->nama_peminjam }}"/>
                        </div>
                        <div class="form-group">
                            <label for="phone_peminjam">Nomor Telp</label>
                            <input type="text" name="phone_peminjam" required id="phone_peminjam" readonly class="form-control" value="{{ $transaksi->phone_peminjam }}"/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" required id="alamat" readonly class="form-control" value="{{ $transaksi->alamat }}"/>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" name="instansi" required id="instansi" readonly class="form-control" value="{{ $transaksi->instansi == null ? "SMKN Modern Ar-Rifa'i" : $transaksi->instansi}}"/>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah yang dipinjam</label>
                            <input type="text" name="jumlah" required id="jumlah" readonly class="form-control" value="{{ $transaksi->jumlah }}"/>
                        </div>
                        {{-- <div class="text-right">
                            <a target="_blank" class="btn btn-primary px-5" href="{{ url('/transaksi/'.$transaksi->kode_transaksi.'/pdf') }}" role="button">Print</a>
                            <a class="btn btn-primary px-5" href="{{ url('/simpan_pinjam') }}" role="button">Kembali</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-4 pt-4">
                <h5 class="font-weight-bold">Kode Barang : {{ $inventaris->kode_barang }}</h5>
                    <div class="position-sticky mt-4 text-center" style="top: 100px">
                        <img src="{{ URL::asset('webcam/transaksi/'.$transaksi->foto) }}" class="rounded mb-4" width="100%" alt="">
                        <a class="btn btn-danger py-2 w-75" href="{{ url('/pinjam/barang/'.$inventaris->id.'/'.$transaksi->kode_transaksi.'/foto') }}" role="button">Ganti foto</a>
                    </div>
                    <div class="row my-5">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success w-100" id="reset">Reset</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary w-100" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>

<script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>

<script>
$('#reset').click(function() {
    $('input').removeAttr('readonly');
});
$('#submit').click(function() {
    $('input').removeAttr('readonly');
});
</script>

@endsection
