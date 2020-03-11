@extends('layouts.frontend')

@section('content')

    <div class="container-fluid px-0 bg-image-home position-relative">
        <div class="bgo-color bgo-absolute position-absolute w-100 h-100"></div>
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

        <div class="container py-5 mt-5">
            <div class="row pb-5">
                <div class="col-md-10 offset-md-1 mt-5 pb-5">
                    <div class="card-choose">
                    <div class="mt-5 p-3 bg-white position-relative">
                        <div class="d-flex mb-3">
                            <img src="{{ URL::asset('img/assets/img/logo.png') }}" class="mt-md-0 mt-3" width="40px" height="38px" alt="">
                            <h4 class="font-weight-bold pt-1 ml-3">FORM PENCARIAN PENGEMBALIAN BARANG</h4>
                        </div>
                        <form action="{{ url('/pengembalian/search') }}" method="get">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-10 pt-3">
                                <div class="form-group">
                                    <label for="search">Cari Kode barang yang akan dikembalikan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-light">
                                            <div class="input-group-text bg-light" id="view"><i class="fa fa-search" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Kode transaksi (XXXXX-XXXXX)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success w-100 mt-0 mt-md-5">Cari</button>
                            </div>
                        </div>
                        </form>
                        <div class="col-md-12 mt-4 text-center">
                            <p>Atau anda ingin meminjam barang ?</p>
                            <a class="btn btn-primary w-50" href="{{ url('/simpan_pinjam') }}" role="button">Peminjaman</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
