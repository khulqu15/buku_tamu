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
                <!-- Form -->
                {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Cari sesuatu..." type="text">
                        </div>
                    </div>
                </form> --}}
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
                                <h3 class="mb-3">Daftar Barang</h3>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button class="btn btn-sm btn-success w-100" data-toggle="modal" data-target="#modelId">Tambah Barang</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Formulir tambah Barang</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <form action="{{ url('barang/add') }}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body text-left">
                                                    {{ csrf_field() }}

                                                    <div class="pl-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                                            <input type="text" name="name" id="name" placeholder="Nama lengkap Barang" class="form-control form-control-alternative" required autofocus>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="foto">{{ __('Foto Barang') }}</label>
                                                                    <input type="file" name="foto" id="foto" class="form-control form-control-alternative" required autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="jumlah">{{ __('Jumlah ') }} (Opsional)</label>
                                                                    <input type="number" name="jumlah" id="jumlah" class="form-control form-control-alternative" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="description">{{ __('Deskripsi Barang') }}</label>
                                                            <textarea name="description" id="description" placeholder="Masukkan Deskripsi Barang" class="form-control form-control-alternative" required rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success px-5">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4 text-right">
                                <form action="{{ url('barang/search') }}" method="get">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm mb-3">
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Barang...">
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
                                    <th scope="col">Foto Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Ketersediaan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                                @foreach ($inventaris as $inven)
                                    <tr>
                                        <td scope="col"><img src="{{ URL::asset('img/inventaris/'.$inven->foto) }}" class="rounded" width="80px" alt=""></td>
                                        <td scope="col">{{ $inven->name }}</td>
                                        <td scope="col">{{ $inven->description }}</td>
                                        <td scope="col">{{ $inven->jumlah }}</td>
                                        <td scope="col">{{ $inven->status }}</td>
                                        <td scope="col">
                                            <a class="btn btn-success btn-sm" href="{{ url('barang/'.$inven->id) }}" role="button">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('barang_delete/'.$inven->id) }}" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        {{ $inventaris->links() }}
                                    </td>
                                    <td colspan="3">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Jumlah barang : {{ $inventaris->total() }}</strong>
                                        </div>
                                    </td>
                                </tr>
                            <tbody>
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
