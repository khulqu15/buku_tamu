@extends('layouts.frontend')

@section('content')


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

<div class="container-fluid bg-light px-0">
    <div class="container pt-4 mt-4">
        <div class="row">
            <form action="{{ url('/pinjam/barang/'.$inventaris->id.'/'.$inventaris->kode_barang) }}" method="post">
                {{ csrf_field() }}
            <div class="col-md-12">
                <h3 class="font-weight-bold">FORM PEMINJAMAN BARANG</h3>
                <div class="row">
                    <div class="col-md-8 pr-md-5">
                        <div class="pr-md-5 pr-0 mr-md-3 mr-0">
                            <div class="col-lg-12 mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="barang">Nama Barang</label>
                                        <input disabled type="text" name="barang" id="barang" required class="form-control" value="{{ $inventaris->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Lengkap</label>
                                            <input type="text" name="nama_peminjam" id="nama_peminjam" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone_peminjam">Nomor Telp</label>
                                            <input type="text" name="phone_peminjam" id="phone_peminjam" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="instansi">Instansi</label>
                                            <input type="text" name="instansi" id="instansi" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" required class="form-control" min="1" max="{{ $inventaris->jumlah }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pengembalian">Pengembalian</label>
                                            <input type="date" name="pengembalian" id="pengembalian" required class="form-control">
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- @if($inventaris->jumlah == "0")
                                <div class="alert alert-danger" role="alert">
                                    <strong>Kosong, Dipinjam semua</strong>
                                </div>
                                @else
                                <div class="alert alert-info" role="alert">
                                    <strong>Ada, tersedia {{ $inventaris->jumlah }} barang</strong>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name">Nama Inventaris</label>
                                            <input type="text" disabled name="name" id="name" required class="form-control" value="{{ $inventaris->name }}">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Jumlah</label>
                                            <input type="number" name="" id="" required class="form-control" value="{{ $inventaris->jumlah }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Deskripsi</label>
                                    <textarea name="tujuan" required id="tujuan" disabled class="form-control" rows="2">{{ $inventaris->description }}</textarea>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pt-4">

                            <h5 class="font-weight-bold">Kode Barang : {{ $inventaris->kode_barang }}</h5>

                            <div class="position-sticky mt-5 text-center" style="top: 100px">
                                <div class="w-100 bg-white rounded peminjaman-picture" style="height: 300px"></div>
                                <button type="submit" class="btn btn-danger py-2 my-4 px-5 w-75">Ambil foto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
