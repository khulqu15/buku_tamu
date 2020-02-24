<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Tamu</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>

    <div class="container-fluid mx-0">
        @if (session('error'))
            <div class="alert alert-danger position-relative w-100" style="top: 0; left: 0;">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success position-relative w-100" style="top: 0; left: 0;">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <form action="{{ url('/') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8 pt-5">
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
                                <h3 class="mb-4">Buku Tamu</h3>
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
                            </div>

                            <div class="col-md-4">
                                <div class="position-sticky" style="top: 100px">
                                    <img src="{{ URL::asset('webcam/tamu/'.$tamu->foto) }}" width="100%" alt="">
                                    <button type="submit" class="btn btn-primary w-100 mb-5 mt-3">Selesai</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
