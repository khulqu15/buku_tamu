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

    <div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div>
                <form action="{{ url('/peminjaman/search') }}" method="get">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-10 pt-3">
                            <div class="form-group">
                                <label for="search">Cari lainnya</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-white" id="view"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" name="search" id="search" class="form-control border-left-0" value="{{ $key }}" placeholder="Cari berdasarkan nama">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary w-100 mt-0 mt-md-5">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($inventaris as $inven)
            <div class="card_barang mb-4">
                <div class="row bg-white py-2 rounded">
                    <div class="col-lg-2 col-md-3 col-6 py-md-2">
                        <img src="{{ URL::asset('img/inventaris/'.$inven->foto) }}" class="w-100 rounded" alt="">
                    </div>
                    <div class="col-lg-10 col-md-9 col-6">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="pt-md-5">
                                    <h3>{{ $inven->name }}</h3>
                                    <p>{{ $inven->description }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="pt-md-5 mt-md-2">
                                    <p class="alert alert-success p-3 py-0">Stock: {{ $inven->jumlah }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pt-md-5 mt-md-3">
                                    <a class="btn btn-success py-2 w-100" href="{{ url('/pinjam/barang/'.$inven->id) }}" role="button">Pinjam</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventaris as $inven)
                    <tr>
                        <td scope="row">
                            <img src="{{ URL::asset('img/inventaris/'.$inven->foto) }}" width="100px" alt="">
                        </td>
                        <td>{{ $inven->name }}</td>
                        <td>{{ $inven->description }}</td>
                        <td>{{ $inven->jumlah }}</td>
                        <td><a class="btn btn-primary" href="{{ url('/pinjam/barang/'.$inven->id) }}" role="button">Pinjam</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
        <div class="col-md-6 offset-md-2">
            {{ $inventaris->links() }}
        </div>
    </div>

</div>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>

@endsection
