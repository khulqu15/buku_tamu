@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if (session('success'))
        <div class="alert alert-success position-fixed alert-dismissible fade show w-100 rounded-0" role="alert" style="z-index: 100; top: 0; right: 0; left: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Berhasil !.</strong> {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger position-fixed alert-dismissible fade show w-100 rounded-0" role="alert" style="z-index: 100; top: 0; right: 0; left: 0;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Gagal !.</strong> {{ session('error') }}
    </div>
    @endif

    <div class="container-fluid mt--7">
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Dashboard') }}</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ URL::asset('img/pegawai/'.auth()->user()->foto) }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                            </div>
                            <a href="{{ url('pegawai/'.auth()->user()->id) }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>{{ __('My profile') }}</span>
                            </a>
                            <a href="{{ url('pegawai/'.auth()->user()->id) }}" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>{{ __('Settings') }}</span>
                            </a>

                            {{-- <a href="#" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>{{ __('Activity') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>{{ __('Support') }}</span>
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <h3 class="mb-3">Daftar transaksi</h3>
                            </div>
                            <div class="col-sm-4 offset-sm-4 mt-4 text-right">
                            <form action="{{ url('transaksi/search') }}" method="get">
                                <div class="form-group">
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="text" name="search" value="{{ $query }}" id="search" class="form-control" placeholder="Cari transaksi...">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Nomor hp</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $tf)
                                    <tr>
                                        <td scope="col">{{ $tf->kode_transaksi }}</td>
                                        <td scope="col">{{ $tf->nama_peminjam }}</td>
                                        <td scope="col">{{ $tf->phone_peminjam }}</td>
                                        <td scope="col">{{ $tf->jumlah }}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm" href="{{ url('transaksi_delete/'.$tf->id) }}" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">{{ $transaksi->links() }}</td>
                                    <td colspan="2">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Total transaksi : {{ $transaksi->total() }}</strong>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    {{-- <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script> --}}

@endpush
