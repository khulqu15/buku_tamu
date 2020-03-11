
@extends('layouts.frontend')

@section('content')

    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0" style="height:100vh;overflow:hidden">
            <div class="col-md-8 h-100 m-0 p-0" >
                <img src="{{ URL::asset('img/assets/img/ar-rifai_bg.png') }}" class="w-100" alt="Gambar masjid Ar-Rifai">
                <div class="position-absolute w-100 text-white pt-5 px-4 pb-3 wlcm">
                    <h1 class="font-weight-bold">SELAMAT DATANG</h1>
                    <p class="mb-0">SISTEM INFORMASI BUKU TAMU DAN PEMINJAMAN</p>
                    <p class="font-weight-bold">SMK MODERN AL - RIFA'IE</p>
                    <i class="fas fa-angle-right position-absolute"></i>
                </div>
            </div>
            <div class="col-md-4 m-0 p-0 bg-light position-relative">
                <img src="{{ URL::asset('img/assets/img/ar-rifai_bg1.png') }}" class="w-100 h-100" alt="Gambar masjid Ar-Rifai" style="opacity: .6">
                <div class="position-absolute logo align-middle d-inline-block w-100 h-100 text-center">
                    <img src="{{ URL::asset('img/assets/img/ar-rifai_logo.png') }}" class="position-relative" alt="">
                </div>

            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>


    <script>
        document.addEventListener('keypress', function() {
            window.location.href = "{{ url('/fitur') }}"
        });
        document.addEventListener('click', function() {
            window.location.href = "{{ url('/fitur') }}"
        });
    </script>

@endsection
