@extends('layouts.frontend')

@section('content')
<div class="container-fluid py-5 bg-image-home overflow-hidden position-relative">
    <div class="bgo-color position-absolute w-100 h-100 bgo-absolute"></div>
    <div class="container my-5 py-5 position-relative">
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
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-2">
                <div class="login-card">
                    <div class="position-relative bg-light px-5 pb-5 pt-3" style="z-index: 10">
                        <div class="position-relative text-center">
                            <img src="{{ URL::asset('img/assets/img/logo.png') }}" width="25%" alt="">
                            <h4 class="mt-3 font-weight-bold text-dark">SMK MODERN AL-RIFA'IE</h4>
                            <h5 class="mb-3 font-weight-bold text-dark">SISTEM INFORMASI BUKU TAMU DAN PEMINJAMAN</h5>
                            <div class="text-left mt-5">
                                <form action="{{ url('/login/post') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Masukkan username anda">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan password anda">
                                            <div class="input-group-append bg-light">
                                                <div class="input-group-text bg-light" id="view"><i class="fa fa-eye" id="eyePassword" onclick="togglePassword()" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="px-5 py-3 w-50 mt-5 mb-4 btn btn-danger">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            $('#eyePassword').addClass('text-primary');
        } else {
            x.type = "password";
            $('#eyePassword').removeClass('text-primary');
        }
    }
</script>

@endsection
