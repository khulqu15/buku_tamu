@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

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
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Diagram Tamu</h6>
                                <h3 class="text-white mb-0">Laporan tamu yang berkunjung</h3>
                            </div>
                                {{-- <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#myTamu" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                            <a href="#" id="putWeek" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Week</span>
                                                <span class="d-md-none">W</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="putMonth" data-toggle="chart" data-target="#myTamu" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Month</span>
                                                <span class="d-md-none">M</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="myTamu" height="100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 pt-5">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Diagram pengembalian</h6>
                                <h2 class="mb-0">Laporan Pengembalian</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-pengembalian" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 pt-5">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Diagram Pinjaman</h6>
                                <h2 class="mb-0">Laporan Peminjaman</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-peminjaman" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ URL::asset('js/Chart.js') }}"></script>

    <script>
        var ctx = document.getElementById("chart-pengembalian").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                        <?= json_encode($days[6]) ?>, <?= json_encode($days[5]) ?>,
                        <?= json_encode($days[4]) ?>, <?= json_encode($days[3]) ?>,
                        <?= json_encode($days[2]) ?>, <?= json_encode($days[1]) ?>,
                        <?= json_encode($days[0]) ?>
                    ],
                datasets: [{
                    label: 'Laporan tamu selama seminggu terakhir',
                    data: [
                        <?=json_encode($kembali[6]);?>,
                        <?=json_encode($kembali[5]);?>,
                        <?=json_encode($kembali[4]);?>,
                        <?=json_encode($kembali[3]);?>,
                        <?=json_encode($kembali[2]);?>,
                        <?=json_encode($kembali[1]);?>,
                        <?=json_encode($kembali[0]);?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }],
                }
            }
        });
    </script>


    <script>
        var ctx = document.getElementById("chart-peminjaman").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                        <?= json_encode($days[6]) ?>, <?= json_encode($days[5]) ?>,
                        <?= json_encode($days[4]) ?>, <?= json_encode($days[3]) ?>,
                        <?= json_encode($days[2]) ?>, <?= json_encode($days[1]) ?>,
                        <?= json_encode($days[0]) ?>
                    ],
                datasets: [{
                    label: 'Laporan tamu selama seminggu terakhir',
                    data: [
                        <?=json_encode($peminjaman[6]);?>,
                        <?=json_encode($peminjaman[5]);?>,
                        <?=json_encode($peminjaman[4]);?>,
                        <?=json_encode($peminjaman[3]);?>,
                        <?=json_encode($peminjaman[2]);?>,
                        <?=json_encode($peminjaman[1]);?>,
                        <?=json_encode($peminjaman[0]);?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }],
                }
            }
        });
    </script>


    <script>
        var ctx = document.getElementById("myTamu").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                        <?= json_encode($days[6]) ?>, <?= json_encode($days[5]) ?>,
                        <?= json_encode($days[4]) ?>, <?= json_encode($days[3]) ?>,
                        <?= json_encode($days[2]) ?>, <?= json_encode($days[1]) ?>,
                        <?= json_encode($days[0]) ?>
                    ],
                datasets: [{
                    label: 'Laporan tamu selama seminggu terakhir',
                    data: [
                        <?=json_encode($tamuday[6]);?>,
                        <?=json_encode($tamuday[5]);?>,
                        <?=json_encode($tamuday[4]);?>,
                        <?=json_encode($tamuday[3]);?>,
                        <?=json_encode($tamuday[2]);?>,
                        <?=json_encode($tamuday[1]);?>,
                        <?=json_encode($tamuday[0]);?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }],
                }
            }
        });
    </script>
@endpush
