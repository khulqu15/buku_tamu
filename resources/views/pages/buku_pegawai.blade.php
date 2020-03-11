@extends('layouts.frontend')

@section('content')

<div class="container-fluid px-0 mx-0 bg-image-home position-relative">
    <div class="bgo-white bgo-absolute position-absolute w-100 h-100"></div>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('buku_tamu/'.$tamu->api_token.'/pegawai/'.$pegawai->id.'/pdf') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8 pr-md-5 pt-5">
                            <div class="pr-md-5 pr-0 mr-md-3 mr-0">
                                <h3 class="mb-4">Data Tamu</h3>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" disabled name="name" id="name" required class="form-control" value="{{ $tamu->name }}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @if($tamu->gender == "Laki-Laki")
                                    <div class="col-3">
                                        <input type="radio" name="gender" checked value="Laki-Laki" required id="male">
                                        <label for="male">Laki laki</label>
                                    </div>
                                    @else
                                    <div class="col-3">
                                        <input type="radio" checked name="gender" value="Perempuan" required id="female">
                                        <label for="male">Perempuan</label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input type="text" name="phone" disabled id="phone" required class="form-control" value="{{ $tamu->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" name="umur" id="umur" required class="form-control" value="{{ $tamu->umur }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" disabled required rows="5">{{ $tamu->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="instansi">Instansi ( Opsional )</label>
                                @if($tamu->instansi == null)
                                    <input type="text" name="instansi" id="instansi" class="form-control" disabled value="-">
                                @else
                                    <input type="text" name="instansi" id="instansi" class="form-control" disabled value="{{ $tamu->instansi }}">
                                @endif
                                </div>
                            <div class="form-group">
                                <label for="user">Pilih Pegawai</label>
                                <select name="user" required id="user" disabled class="form-control">
                                    <option value="{{$pegawai->id}}">{{ $pegawai->name }}</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan bertamu</label>
                                <textarea name="tujuan" required id="tujuan" disabled class="form-control" rows="5">{{ $tamu->tujuan }}</textarea>
                            </div>
                            <div class="alert alert-info d-inline-block w-100" role="alert">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img src="{{ URL::asset('img/pegawai/'.$pegawai->foto) }}" alt="" width="75%">
                                    </div>
                                    <div class="col-md-9 my-4">
                                        <h3>Cara menuju ruangan {{ $pegawai->name }}</h3>
                                        <h6>{{ $pegawai->ruangan }}, </h6>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-sticky py-5" style="top: 100px">
                                <img src="{{ URL::asset('webcam/tamu/'.$tamu->foto) }}" width="100%" alt="">
                                <button type="submit" class="btn btn-danger w-100 mb-3 mt-3">Cetak</button>
                                <a class="btn btn-primary w-100 mb-5" href="{{ url('/') }}" role="button">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
