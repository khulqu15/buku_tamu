@extends('layouts.frontend')

@section('content')

<div class="container-fluid px-0 bg-light">
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

<div class="container pt-5">
<div class="row">
    <div class="col-md-12">
        <h3 class="font-weight-bold">FORM PENGEMBALIAN BARANG</h3>
        <div class="row">


            <div class="col-md-8 pr-md-5">
                <div class="pr-md-5 pr-0 mr-md-3 mr-0">
                    <form action="{{ url('pinjam/barang/'.$inventaris->id.'/transaksi/'.$transaksi->kode_transaksi.'/update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="barang">Nama Barang</label>
                            <input type="text" name="barang" required id="barang" disabled class="form-control" value="{{ $inventaris->name }}"/>
                        </div>
                        <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" required id="nama_peminjam" disabled class="form-control" value="{{ $transaksi->nama_peminjam }}"/>
                        </div>
                        <div class="form-group">
                            <label for="phone_peminjam">Nomor Telp</label>
                            <input type="text" name="phone_peminjam" required id="phone_peminjam" disabled class="form-control" value="{{ $transaksi->phone_peminjam }}"/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" required id="alamat" disabled class="form-control" value="{{ $transaksi->alamat }}"/>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" name="instansi" required id="instansi" readonly class="form-control" value="{{ $transaksi->instansi == null ? "SMKN Modern Ar-Rifa'i" : $transaksi->instansi}}"/>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah yang dipinjam</label>
                            <input type="text" name="jumlah" required id="jumlah" disabled class="form-control" value="{{ $transaksi->jumlah }}"/>
                        </div>
                        {{-- <div class="alert alert-success" role="alert">
                            <div class="mb-3">
                                <strong>Transaksi sukses, anda meminjam {{ $transaksi->jumlah }} Barang</strong>
                            </div>
                            <h2>Kode Transaski : <u>{{ $transaksi->kode_transaksi }}</u></h2>
                        </div> --}}

                    </form>
                </div>
            </div>


                {{-- <div class="alert alert-success" role="alert">
                    <div class="mb-3">
                        <strong>Transaksi sukses, anda meminjam {{ $transaksi->jumlah }} Barang</strong>
                    </div>
                    <h2>Kode Transaski : <u>{{ $transaksi->kode_transaksi }}</u></h2>
                </div> --}}

            <div class="col-md-4 pt-4">
                <div class="position-sticky text-center" style="top: 100px">
                    <img class="rounded-lg" src="{{ URL::asset('webcam/transaksi/'.$transaksi->foto) }}" width="100%" alt="">
                    {{-- <a class="btn btn-danger mt-4 w-75" href="{{ url('/pinjam/barang/'.$inventaris->id.'/'.$transaksi->kode_transaksi.'/foto') }}" role="button">Ganti foto</a> --}}
                </div>
                <div class="text-center">
                    <a class="btn btn-success w-75 my-3 px-5 mb-5" href="{{ url('/kembali/barang/'.$inventaris->id.'/transaksi/'.$transaksi->kode_transaksi) }}" role="button">Kembalikan</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
