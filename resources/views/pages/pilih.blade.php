@extends('layouts.frontend')

@section('content')

    @include('layouts.navbars.mynav')

    <div class="container-fluid bg-image-home pb-5 position-relative" style="height:calc(100vh - 82px)">
        <div class="bgo-color position-absolute w-100 h-100 bgo-absolute"></div>
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
        <div class="login-portal position-absolute">
            <a href="{{ url('/login') }}">
                <img src="{{ URL::asset('img/assets/icon/login.png') }}" alt="Login">
            </a>
        </div>
    </div>


    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

@endsection
