
@extends('layouts.frontend')

@section('content')

    <div class="row">
        <div class="col-md-8 bg-home position-relative bg-image-home">
            <div class="text-welcome-home position-absolute w-100 px-5 bgo-color py-3 text-white">
                <h1 class="font-weight-bold">SELAMAT DATANG</h1>
                <h5>SISTEM INFORMASI BUKU TAMU DAN PEMINJAMAN</h5>
                <h5 class="font-weight-bold">SMK MODERN AL - RIFA'IE</h5>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <div class="col-md-4 bg-home bg-image1-home position-relative">
            <div class="image-logo-home position-absolute w-100 text-center">
                <img src="{{ URL::asset('img/assets/img/logo.png') }}" width="40%" alt="">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('keypress', function() {
            window.location.href = "{{ url('/fitur') }}"
        });
        document.addEventListener('click', function() {
            window.location.href = "{{ url('/fitur') }}"
        });
    </script>

@endsection
