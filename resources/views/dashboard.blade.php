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
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0">
                                            <a href="#" id="putDay" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Harian</span>
                                                <span class="d-md-none">H</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mr-2 mr-md-0">
                                            <a href="#" id="putWeek" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Mingguan</span>
                                                <span class="d-md-none">M</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="putMonth">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Bulanan</span>
                                                <span class="d-md-none">B</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="putYear">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Tahunan</span>
                                                <span class="d-md-none">T</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="myTamu" height="100%"></canvas>
                            <canvas id="myTamuweeks" height="100%" class="d-none"></canvas>
                            <canvas id="myTamumonth" height="100%" class="d-none"></canvas>
                            <canvas id="myTamuyears" height="100%" class="d-none"></canvas>
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
                            <canvas id="chart-pengembalianweeks" class="chart-canvas d-none"></canvas>
                            <canvas id="chart-pengembalianmonth" class="chart-canvas d-none"></canvas>
                            <canvas id="chart-pengembalianyears" class="chart-canvas d-none"></canvas>
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
                            <canvas id="chart-peminjamanweeks" class="chart-canvas d-none"></canvas>
                            <canvas id="chart-peminjamanmonth" class="chart-canvas d-none"></canvas>
                            <canvas id="chart-peminjamanyears" class="chart-canvas d-none"></canvas>
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
    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/Chart.js') }}"></script>

    <script>

        $(document).ready(function() {
            $('#putDay').click(function() {
                $('#myTamu').removeClass("d-none");
                $('#myTamuweeks').addClass("d-none");
                $('#myTamumonth').addClass("d-none");
                $('#myTamuyears').addClass("d-none");

                $('#chart-pengembalian').removeClass("d-none");
                $('#chart-pengembalianweeks').addClass("d-none");
                $('#chart-pengembalianmonth').addClass("d-none");
                $('#chart-pengembalianyears').addClass("d-none");

                $('#chart-peminjaman').removeClass("d-none");
                $('#chart-peminjamanweeks').addClass("d-none");
                $('#chart-peminjamanmonth').addClass("d-none");
                $('#chart-peminjamanyears').addClass("d-none");
            });

            $('#putWeek').click(function() {
                $('#myTamu').addClass("d-none");
                $('#myTamuweeks').removeClass("d-none");
                $('#myTamumonth').addClass("d-none");
                $('#myTamuyears').addClass("d-none");

                $('#chart-pengembalian').addClass("d-none");
                $('#chart-pengembalianweeks').removeClass("d-none");
                $('#chart-pengembalianmonth').addClass("d-none");
                $('#chart-pengembalianyears').addClass("d-none");

                $('#chart-peminjaman').addClass("d-none");
                $('#chart-peminjamanweeks').removeClass("d-none");
                $('#chart-peminjamanmonth').addClass("d-none");
                $('#chart-peminjamanyears').addClass("d-none");
            });

            $('#putMonth').click(function() {
                $('#myTamu').addClass("d-none");
                $('#myTamuweeks').addClass("d-none");
                $('#myTamumonth').removeClass("d-none");
                $('#myTamuyears').addClass("d-none");

                $('#chart-pengembalian').addClass("d-none");
                $('#chart-pengembalianweeks').addClass("d-none");
                $('#chart-pengembalianmonth').removeClass("d-none");
                $('#chart-pengembalianyears').addClass("d-none");

                $('#chart-peminjaman').addClass("d-none");
                $('#chart-peminjamanweeks').addClass("d-none");
                $('#chart-peminjamanmonth').removeClass("d-none");
                $('#chart-peminjamanyears').addClass("d-none");
            });

            $('#putYear').click(function() {
                $('#myTamu').addClass("d-none");
                $('#myTamuweeks').addClass("d-none");
                $('#myTamumonth').addClass("d-none");
                $('#myTamuyears').removeClass("d-none");

                $('#chart-pengembalian').addClass("d-none");
                $('#chart-pengembalianweeks').addClass("d-none");
                $('#chart-pengembalianmonth').addClass("d-none");
                $('#chart-pengembalianyears').removeClass("d-none");

                $('#chart-peminjaman').addClass("d-none");
                $('#chart-peminjamanweeks').addClass("d-none");
                $('#chart-peminjamanmonth').addClass("d-none");
                $('#chart-peminjamanyears').removeClass("d-none");
            });
        });

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
                    label: 'Laporan pengembalian harian',
                    data: [
                        <?=json_encode($kembalidays[6]);?>,
                        <?=json_encode($kembalidays[5]);?>,
                        <?=json_encode($kembalidays[4]);?>,
                        <?=json_encode($kembalidays[3]);?>,
                        <?=json_encode($kembalidays[2]);?>,
                        <?=json_encode($kembalidays[1]);?>,
                        <?=json_encode($kembalidays[0]);?>
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
        var ctx = document.getElementById("chart-pengembalianweeks").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Minggu4", "Minggu3", "Minggu2", "Minggu sekarang"],
                datasets: [{
                    label: 'Laporan pengembalian Mingguan',
                    data: [
                        <?=json_encode($kembaliweeks[3]);?>,
                        <?=json_encode($kembaliweeks[2]);?>,
                        <?=json_encode($kembaliweeks[1]);?>,
                        <?=json_encode($kembaliweeks[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("chart-pengembalianweeks").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Minggu4", "Minggu3", "Minggu2", "Minggu sekarang"],
                datasets: [{
                    label: 'Laporan pengembalian Mingguan',
                    data: [
                        <?=json_encode($kembaliweeks[3]);?>,
                        <?=json_encode($kembaliweeks[2]);?>,
                        <?=json_encode($kembaliweeks[1]);?>,
                        <?=json_encode($kembaliweeks[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("chart-pengembalianmonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?=json_encode($month[4])?>,<?=json_encode($month[3])?>,
                    <?=json_encode($month[2])?>,<?=json_encode($month[1])?>,<?=json_encode($month[0])?>,
                ],
                datasets: [{
                    label: 'Laporan pengembalian Bulanan',
                    data: [
                        <?=json_encode($kembalimonth[4]);?>,
                        <?=json_encode($kembalimonth[3]);?>,
                        <?=json_encode($kembalimonth[2]);?>,
                        <?=json_encode($kembalimonth[1]);?>,
                        <?=json_encode($kembalimonth[0]);?>,
                    ],
                    backgroundColor: [
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
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            // beginAtZero: true,
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
                    label: 'Laporan peminjaman harian',
                    data: [
                        <?=json_encode($peminjamandays[6]);?>,
                        <?=json_encode($peminjamandays[5]);?>,
                        <?=json_encode($peminjamandays[4]);?>,
                        <?=json_encode($peminjamandays[3]);?>,
                        <?=json_encode($peminjamandays[2]);?>,
                        <?=json_encode($peminjamandays[1]);?>,
                        <?=json_encode($peminjamandays[0]);?>
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
                    label: 'Laporan peminjaman harian',
                    data: [
                        <?=json_encode($peminjamandays[6]);?>,
                        <?=json_encode($peminjamandays[5]);?>,
                        <?=json_encode($peminjamandays[4]);?>,
                        <?=json_encode($peminjamandays[3]);?>,
                        <?=json_encode($peminjamandays[2]);?>,
                        <?=json_encode($peminjamandays[1]);?>,
                        <?=json_encode($peminjamandays[0]);?>
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
        var ctx = document.getElementById("chart-peminjamanweeks").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Minggu4", "Minggu3", "Minggu2", "Minggu sekarang"],
                datasets: [{
                    label: 'Laporan peminjaman Mingguan',
                    data: [
                        <?=json_encode($peminjamanweeks[3]);?>,
                        <?=json_encode($peminjamanweeks[2]);?>,
                        <?=json_encode($peminjamanweeks[1]);?>,
                        <?=json_encode($peminjamanweeks[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("chart-peminjamanmonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?=json_encode($month[4])?>,<?=json_encode($month[3])?>,
                    <?=json_encode($month[2])?>,<?=json_encode($month[1])?>,<?=json_encode($month[0])?>,
                ],
                datasets: [{
                    label: 'Laporan peminjaman Bulanan',
                    data: [
                        <?=json_encode($peminjamanmonth[4]);?>,
                        <?=json_encode($peminjamanmonth[3]);?>,
                        <?=json_encode($peminjamanmonth[2]);?>,
                        <?=json_encode($peminjamanmonth[1]);?>,
                        <?=json_encode($peminjamanmonth[0]);?>
                    ],
                    backgroundColor: [
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
                    label: 'Laporan tamu harian',
                    data: [
                        <?=json_encode($tamudays[6]);?>,
                        <?=json_encode($tamudays[5]);?>,
                        <?=json_encode($tamudays[4]);?>,
                        <?=json_encode($tamudays[3]);?>,
                        <?=json_encode($tamudays[2]);?>,
                        <?=json_encode($tamudays[1]);?>,
                        <?=json_encode($tamudays[0]);?>
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
        var ctx = document.getElementById("myTamuweeks").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Minggu4", "Minggu3", "Minggu2", "Minggu Sekarang"],
                datasets: [{
                    label: 'Laporan tamu Mingguan',
                    data: [
                        <?=json_encode($tamuweeks[3]);?>,
                        <?=json_encode($tamuweeks[2]);?>,
                        <?=json_encode($tamuweeks[1]);?>,
                        <?=json_encode($tamuweeks[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("myTamumonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [                    <?=json_encode($month[4])?>,<?=json_encode($month[3])?>,
                    <?=json_encode($month[2])?>,<?=json_encode($month[1])?>,<?=json_encode($month[0])?>,],
                datasets: [{
                    label: 'Laporan tamu Bulanan',
                    data: [
                        <?=json_encode($tamumonth[4]);?>,
                        <?=json_encode($tamumonth[3]);?>,
                        <?=json_encode($tamumonth[2]);?>,
                        <?=json_encode($tamumonth[1]);?>,
                        <?=json_encode($tamumonth[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("myTamuyears").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?=json_encode($years[3])?>,<?=json_encode($years[2])?>,
                    <?=json_encode($years[1])?>,<?=json_encode($years[0])?>,],
                datasets: [{
                    label: 'Laporan tamu Tahunan',
                    data: [
                        <?=json_encode($tamuyears[3]);?>,
                        <?=json_encode($tamuyears[2]);?>,
                        <?=json_encode($tamuyears[1]);?>,
                        <?=json_encode($tamuyears[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("chart-peminjamanyears").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?=json_encode($years[3])?>,<?=json_encode($years[2])?>,
                    <?=json_encode($years[1])?>,<?=json_encode($years[0])?>,],
                datasets: [{
                    label: 'Laporan peminjaman Tahunan',
                    data: [
                        <?=json_encode($peminjamanyears[3]);?>,
                        <?=json_encode($peminjamanyears[2]);?>,
                        <?=json_encode($peminjamanyears[1]);?>,
                        <?=json_encode($peminjamanyears[0]);?>
                    ],
                    backgroundColor: [
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
        var ctx = document.getElementById("chart-pengembalianyears").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?=json_encode($years[3])?>,<?=json_encode($years[2])?>,
                    <?=json_encode($years[1])?>,<?=json_encode($years[0])?>,],
                datasets: [{
                    label: 'Laporan pengembalian Tahunan',
                    data: [
                        <?=json_encode($kembaliyears[3]);?>,
                        <?=json_encode($kembaliyears[2]);?>,
                        <?=json_encode($kembaliyears[1]);?>,
                        <?=json_encode($kembaliyears[0]);?>
                    ],
                    backgroundColor: [
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
