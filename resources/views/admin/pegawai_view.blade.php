@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @if($pegawai->id == Auth::user()->id)
        @include('users.partials.header', [
            'title' => __('Hello') . ' '. $pegawai->name,
            'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
            'class' => 'col-lg-7'
        ])
    @else
        @include('users.partials.header', [
            'title' => $pegawai->name . ' ' . __('Profil'),
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
                                    @if($pegawai->foto == null)
                                            @if($pegawai->gender == "Perempuan")
                                                <img src="{{ URL::asset('img/pegawai/female.png') }}" class="rounded-circle bg-light" alt="">
                                            @else
                                                <img src="{{ URL::asset('img/pegawai/male.png') }}" class="rounded-circle bg-light" alt="">
                                            @endif
                                    @else
                                        <img src="{{ URL::asset('img/pegawai/'.$pegawai->foto) }}" class="rounded-circle bg-light">
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
                                {{ $pegawai->name }}<span class="font-weight-light"></span> - {{ $pegawai->nip }}
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $pegawai->tmp_lahir }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $pegawai->jabatan }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Inagata Technosmith
                            </div>
                            <hr class="my-4" />
                            <p>{{ $pegawai->ruangan }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/pegawai/'.$pegawai->id.'/update') }}" enctype="multipart/form-data" autocomplete="off">

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
                                        @if($pegawai->level == "Admin")
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai">Pegawai</option>
                                        @else
                                            <option value="Pegawai">Pegawai</option>
                                            <option value="Admin">Admin</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative" value="{{ $pegawai->name }}" required autofocus>
                                </div>
                                @if($pegawai->gender == "Laki Laki")
                                <div class="form-group">
                                    <div class="mr-5 d-inline">
                                        <input type="radio" name="gender" id="laki-laki" value="Laki Laki" checked required autofocus>
                                        <label class="form-control-label"  for="name">{{ __('Laki Laki') }}</label>
                                    </div>
                                    <div class="d-inline">
                                        <input type="radio" name="gender" id="peremupan" value="Perempuan" required autofocus>
                                        <label class="form-control-label" for="name">{{ __('Perempuan') }}</label>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <div class="mr-5 d-inline">
                                        <input type="radio" name="gender" id="laki-laki" value="Laki Laki" required autofocus>
                                        <label class="form-control-label"  for="name">{{ __('Laki Laki') }}</label>
                                    </div>
                                    <div class="d-inline">
                                        <input type="radio" name="gender" id="peremupan" value="Perempuan" checked required autofocus>
                                        <label class="form-control-label" for="name">{{ __('Perempuan') }}</label>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="form-control-label" for="nip">{{ __('Nip') }}</label>
                                    <input type="text" name="nip" id="nip" class="form-control form-control-alternative" value="{{ $pegawai->nip }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="foto">{{ __('Upload Foto') }}</label>
                                    <input type="file" name="foto" id="foto" class="form-control form-control-alternative">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="jabatan">{{ __('Jabatan') }}</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control form-control-alternative" value="{{ $pegawai->jabatan }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tmp_lahir">{{ __('Tempat Lahir') }}</label>
                                            <input type="text" name="tmp_lahir" id="tmp_lahir" value="{{ $pegawai->tmp_lahir }}" class="form-control form-control-alternative" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $pegawai->tgl_lahir }}" class="form-control form-control-alternative" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="ruangan">{{ __('Ruangan') }}</label>
                                    <textarea name="ruangan" id="ruangan" class="form-control form-control-alternative" required rows="5">{{ $pegawai->ruangan }}</textarea>
                                </div>
                                <div id="form-personal">
                                    <div class="form-group">
                                        <label class="form-control-label" for="username">{{ __('Username') }}</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-alternative" value="{{ $pegawai->username }}">
                                    </div>
                                    @if($pegawai->level == "Admin")
                                        <div class="form-group">
                                            <label class="form-control-label" for="password_old">{{ __('Password lama') }}</label>
                                            <input type="password" name="password_old" id="password_old" class="form-control form-control-alternative">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-control-label" for="password_new">{{ __('Password baru') }}</label>
                                        <input type="password" name="password_new" id="password_new" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
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
