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

    @include('pages.nav.navbar')

    <div class="container-fluid mx-0 bg-home px-0">
        <div class="bgo-white">
            @if (session('error'))
            <div class="alert alert-danger position-relative w-100" style="top: 0; left: 0; z-index: 100">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success position-relative w-100" style="top: 0; left: 0; z-index: 100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <h3 class="mb-4 font-weight-bold">FORM PENDAFTARAN BUKU TAMU</h3>
                        <form action="{{ url('/buku_tamu/add') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" required class="form-control" placeholder="Isikan nama lengkap anda">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="radio" name="gender" value="Laki-Laki" required id="male">
                                                <label for="male">Laki laki</label>
                                            </div>
                                            <div class="col-3">
                                                <input type="radio" name="gender" value="Perempuan" required id="female">
                                                <label for="male">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="phone">Nomor Handphone</label>
                                                <input type="text" name="phone" id="phone" required class="form-control" placeholder="Isikan nomor hp anda">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input type="number" name="umur" id="umur" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" required rows="5" placeholder="Provinsi, Kabupaten / Kota, Kecamatan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="instansi">Instansi ( Opsional )</label>
                                        <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Isikan asal instansi anda">
                                    </div>
                                    <div class="form-group">
                                        <label for="user">Pilih Pegawai</label>
                                        <select name="user" required id="user" class="form-control">
                                            <option value="">Pilih Pegawai</option>
                                            @foreach ($pegawai as $pgw)
                                                <option value="{{ $pgw->id }}">{{ $pgw->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan bertamu</label>
                                        <textarea name="tujuan" required id="tujuan" class="form-control" rows="5" placeholder="Apa tujuan anda bertamu ?"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4 offset-md-1">
                                    <div class="position-sticky" style="top: 100px">
                                        <div style="height: 300px" class="w-100 bg-dark rounded"></div>
                                        <button type="submit" class="btn btn-danger py-3 w-100 mb-5 mt-3">Ambil Foto</button>
                                        <div class="row position-relative">
                                            <div class="col-6">
                                                <button class="btn btn-light py-3 w-100 my-5" disabled>Reset</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-success py-3 w-100 my-5" disabled>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
