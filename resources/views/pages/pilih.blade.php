@extends('layouts.frontend')

@section('content')

    @include('layouts.navbars.mynav')

    <div class="container-fluid bg-image-home pb-5 position-relative">
        <div class="bgo-color position-absolute w-100 h-100 bgo-absolute"></div>
        <div class="container position-relative py-5">
            <div class="row py-5">
                <div class="col-md-4 offset-md-1 pt-5 mt-5">
                    <a href="{{ url('/buku_tamu') }}">
                        <div class="card-choose">
                            <div class="pt-5 pb-5 bg-white shadow-sm rounded text-center">
                                <img src="{{ URL::asset('img/assets/icon/book.png') }}" width="25%" alt="">
                                <h3 class="mt-5 text-dark font-weight-bold">Buku Tamu</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 offset-md-2 pt-5 mt-5">
                    <div class="card-choose py-4 position-relative rounded">
                        <a href="{{ url('/simpan_pinjam') }}">
                            <div class="row mx-3 my-3 pb-4 border-bottom">
                                <div class="col-3">
                                    <img src="{{ URL::asset('img/assets/icon/pinjam.png') }}" width="100%" alt="">
                                </div>
                                <div class="col-9">
                                    <h3 class="text-dark font-weight-bold my-3">PEMINJAMAN</h3>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/pengembalian') }}">
                            <div class="row mx-3 my-3 pt-3">
                                <div class="col-9">
                                    <h3 class="text-dark font-weight-bold my-3">PEMINJAMAN</h3>
                                </div>
                                <div class="col-3">
                                    <img src="{{ URL::asset('img/assets/icon/kembali.png') }}" width="100%" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-portal position-absolute">
            <a href="{{ url('/login') }}">
                <img src="{{ URL::asset('img/assets/icon/login.png') }}" width="70px" alt="">
            </a>
        </div>
    </div>


    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

@endsection
