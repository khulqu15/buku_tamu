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
                            <div class="col-md-3">
                                <h3 class="mb-3">Daftar Pegawai</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <button class="btn btn-sm btn-primary w-100" data-toggle="modal" data-target="#modelId">Tambah pegawai</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Formulir tambah pegawai</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <form action="{{ url('pegawai/add') }}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body text-left">
                                                    {{ csrf_field() }}
                                                    @if (session('status'))
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            {{ session('status') }}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    <div class="pl-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="level">{{ __('Level User') }}</label>
                                                            <select name="level" id="level" class="form-control form-control-alternative">
                                                                    <option value="Pegawai">Pegawai</option>
                                                                    <option value="Admin">Admin</option>
                                                            </select>
                                                        </div>
                                                        <div id="form-personal" class="d-none">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="username">{{ __('Username') }}</label>
                                                                <input type="text" placeholder="Masukkan Usename anda" name="username" id="username" class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="password_new">{{ __('Password') }}</label>
                                                                <input type="password" name="password_new" id="password_new" class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="password_knew">{{ __('Konfirmasi Password') }}</label>
                                                                <input type="password" name="password_knew" id="password_knew" class="form-control form-control-alternative">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                                            <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap anda" class="form-control form-control-alternative" required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mr-5 d-inline">
                                                                <input type="radio" name="gender" id="laki-laki" value="Laki Laki" required autofocus>
                                                                <label class="form-control-label"  for="name">{{ __('Laki Laki') }}</label>
                                                            </div>
                                                            <div class="d-inline">
                                                                <input type="radio" name="gender" id="peremupan" value="Perempuan" required autofocus>
                                                                <label class="form-control-label" for="name">{{ __('Perempuan') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="nip">{{ __('Nip') }}</label>
                                                            <input type="text" name="nip" placeholder="Masukkan nip anda" id="nip" class="form-control form-control-alternative" required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="foto">{{ __('Upload Foto') }}</label>
                                                            <input type="file" name="foto" id="foto" class="form-control form-control-alternative" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="jabatan">{{ __('Jabatan') }}</label>
                                                            <input type="text" name="jabatan" placeholder="Masukkan jabatan anda" id="jabatan" class="form-control form-control-alternative" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="tmp_lahir">{{ __('Tempat Lahir') }}</label>
                                                                    <input type="text" placeholder="Dimana anda lahir ?" name="tmp_lahir" id="tmp_lahir" class="form-control form-control-alternative" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-alternative" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="ruangan">{{ __('Ruangan') }}</label>
                                                            <textarea name="ruangan" id="ruangan" placeholder="Dimana Ruangan anda ?" class="form-control form-control-alternative" required rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary px-5">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mt-4 text-right">
                                <form action="{{ url('/pegawai/search') }}" method="GET">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="search" id="search" value="{{ $query }}" class="form-control" placeholder="Cari Siswa...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary btn-sm w-100">Cari</button>
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
                                    <th scope="col">Foto profil</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Nip</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $p)
                                <tr>
                                    <th scope="row">
                                        @if($p->foto == null)
                                            @if($p->gender == "Perempuan")
                                                <img src="{{ URL::asset('img/pegawai/female.png') }}" width="50px" class="rounded-circle" alt="">
                                            @else
                                                <img src="{{ URL::asset('img/pegawai/male.png') }}" width="50px" class="rounded-circle" alt="">
                                            @endif
                                        @else
                                            <img src="{{ URL::asset('img/pegawai/'.$p->foto) }}" width="50px" class="rounded-circle" alt="">
                                        @endif
                                    </th>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>
                                        <a  class="btn btn-info btn-sm" href="{{ url('pegawai/'.$p->id) }}" role="button">Lihat</a>
                                        <a  class="btn btn-danger btn-sm" href="{{ url('pegawai_delete/'.$p->id) }}" onclick="return confirm('Yakin mau dihapus ?')" role="button">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <div class="mt-3">
                                            {{ $data->links() }}
                                            <div class="text-right">
                                                <strong class="badge badge-info">Total pegawai : {{ $data->total() }}</strong>
                                            </div>
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
