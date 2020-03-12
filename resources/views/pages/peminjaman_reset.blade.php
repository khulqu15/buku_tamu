@extends('layouts.frontend')

@section('content')

@include('layouts.navbars.mynav')

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


<div class="container-fluid bg-image-home position-relative">
    <div class="bgo-white position-absolute w-100 h-100 bgo-absolute"></div>
    <form action="{{ url('/buku_tamu/fix/'.$tamu->api_token.'/pegawai/'.$pegawai->id.'/updated') }}" method="POST">
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 pt-5 pr-md-5">
                        <div class="pr-md-5 pr-0 mr-md-3 mr-0">
                            <h3 class="mb-4 font-weight-bold">FORM PENDAFTARAN BUKU TAMU</h3>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" readonly name="name" id="name" required class="form-control" value="{{ $tamu->name }}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @if($tamu->gender == "Laki-Laki")
                                    <div class="col-3">
                                        <input type="radio" name="gender" readonly checked value="Laki-Laki" required id="male">
                                        <label for="male">Laki laki</label>
                                    </div>
                                    <div class="col-3">
                                        <input type="radio" name="gender" readonly value="Perempuan" required id="female">
                                        <label for="male">Perempuan</label>
                                    </div>
                                    @else
                                    <div class="col-3">
                                        <input type="radio" name="gender" readonly value="Laki-Laki" required id="male">
                                        <label for="male">Laki laki</label>
                                    </div>
                                    <div class="col-3">
                                        <input type="radio" checked name="gender" readonly value="Perempuan" required id="female">
                                        <label for="male">Perempuan</label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input type="text" name="phone" readonly id="phone" required class="form-control" value="{{ $tamu->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" name="umur" id="umur" required class="form-control" value="{{ $tamu->umur }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" readonly required rows="5">{{ $tamu->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="instansi">Instansi ( Opsional )</label>
                                @if($tamu->instansi == null)
                                    <input type="text" name="instansi" id="instansi" class="form-control" readonly value="-">
                                @else
                                    <input type="text" name="instansi" id="instansi" class="form-control" readonly value="{{ $tamu->instansi }}">
                                @endif
                                </div>
                            <div class="form-group">
                                <label for="user">Pilih Pegawai</label>
                                <select name="user" required id="user" readonly class="form-control">
                                    <option value="{{$pegawai->id}}">{{ $pegawai->name }}</option>
                                    @foreach ($pegawais as $p)
                                        <option value="{{$p->id}}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan bertamu</label>
                                <textarea name="tujuan" required id="tujuan" readonly class="form-control" rows="5">{{ $tamu->tujuan }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 py-5">
                        <div class="position-sticky text-center">
                            <img class="rounded" src="{{ URL::asset('webcam/tamu/'.$tamu->foto) }}" width="100%" alt="">
                            <a class="btn btn-danger w-75 my-2 py-2" href="{{ url('buku_tamu/'.$tamu->api_token.'/foto/pegawai/'.$pegawai->id) }}" role="button">Ganti foto</a>
                        </div>
                        <div class="row py-5 my-5">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success py-2 d-inline w-100" id="reset">Reset</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary py-2 d-inline w-100" id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>

<script>
    $('#reset').click(function() {
        var confirmation = confirm('Yakin semua isian akan dikosongi ?');
        if(confirmation === true) {
            $('input').removeAttr('readonly');
            $('select').removeAttr('readonly');
            $('textarea').removeAttr('readonly');
        } else {
            return false;
        }

    });
</script>

@endsection
