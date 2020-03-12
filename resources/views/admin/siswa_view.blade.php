@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @if($siswa->id == Auth::user()->id)
        @include('users.partials.header', [
            'title' => __('Hello') . ' '. $siswa->name,
            'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
            'class' => 'col-lg-7'
        ])
    @else
        @include('users.partials.header', [
            'title' => $siswa->name ,
            'class' => 'col-lg-12'
        ])
    @endif

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
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if($siswa->foto == null)
                                            @if($siswa->gender == "Perempuan")
                                                <img src="{{ URL::asset('img/pegawai/female.png') }}" class="rounded-circle bg-light" alt="">
                                            @else
                                                <img src="{{ URL::asset('img/pegawai/male.png') }}" class="rounded-circle bg-light" alt="">
                                            @endif
                                    @else
                                        <img src="{{ URL::asset('img/pegawai/'.$siswa->foto) }}" class="rounded-circle bg-light">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $siswa->name }}<span class="font-weight-light"></span> -  {{ $siswa->kelas }} {{ $siswa->jurusan }}
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $siswa->jenjang }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $siswa->alamat }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Inagata Technosmith
                            </div>
                            <hr class="my-4" />
                            <p>{{ $siswa->ruangan }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Siswa') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('siswa/'.$siswa->id.'/update') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body text-left">
                                {{ csrf_field() }}

                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" placeholder="Nama lengkap siswa" value="{{ $siswa->name }}" class="form-control form-control-alternative" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        @if($siswa->gender == "Laki Laki")
                                            <div class="mr-5 d-inline">
                                                <input type="radio" name="gender" checked id="laki-laki" value="Laki Laki" required autofocus>
                                                <label class="form-control-label"  for="name">{{ __('Laki Laki') }}</label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" name="gender" id="peremupan" value="Perempuan" required autofocus>
                                                <label class="form-control-label" for="name">{{ __('Perempuan') }}</label>
                                            </div>
                                        @else
                                            <div class="mr-5 d-inline">
                                                <input type="radio" name="gender" id="laki-laki" value="Laki Laki" required autofocus>
                                                <label class="form-control-label"  for="name">{{ __('Laki Laki') }}</label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" name="gender" checked id="peremupan" value="Perempuan" required autofocus>
                                                <label class="form-control-label" for="name">{{ __('Perempuan') }}</label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="kelas">{{ __('Kelas') }}</label>
                                                <input type="number" name="kelas" value="{{ $siswa->kelas }}" placeholder="Kelas" id="kelas" class="form-control form-control-alternative" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label class="form-control-label" for="jurusan">{{ __('Jurusan ') }} (Opsional)</label>
                                                <input type="text" name="jurusan" value="{{ $siswa->jurusan }}" placeholder="Jurusan" id="jurusan" class="form-control form-control-alternative" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="jenjang">{{ __('Jenjang') }}</label>
                                        <select name="jenjang" id="jenjang" class="form-control form-control-alternative">
                                            <option value="{{ $siswa->jenjang }}"> {{ $siswa->jenjang }} </option>
                                            <option value="Sekolah Dasar">Sekolah Dasar</option>
                                            <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertengahan</option>
                                            <option value="Sekolah Menengah Atas / Kejurusan">Sekolah Menengah Atas / Kejurusan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="alamat">{{ __('Alamat') }}</label>
                                        <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat siswa" class="form-control form-control-alternative" required rows="3">{{ $siswa->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success px-5">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script>
        let opt = $('#level').val();
        $(document).ready(function() {
            if(opt === "Admin") {
                $('#form-personal').removeClass('d-none');
            } else if(opt === "Pegawai") {
                $('#form-personal').addClass('d-none');
            }
        });
        // $('#level').change(function() {
        //     if(opt === "Admin") {
        //         $('#form-personal').show();
        //     } else if(opt === "Pegawai") {
        //         $('#form-personal').hide();
        //     }
        // });
    </script>
@endsection
