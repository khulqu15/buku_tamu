@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @if($inventaris->id == Auth::user()->id)
        @include('users.partials.header', [
            'title' => __('Hello') . ' '. $inventaris->name,
            'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
            'class' => 'col-lg-7'
        ])
    @else
        @include('users.partials.header', [
            'title' => $inventaris->name ,
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
                                    @if($inventaris->foto == null)
                                            @if($inventaris->gender == "Perempuan")
                                                <img src="{{ URL::asset('img/pegawai/female.png') }}" class="rounded-circle bg-light" alt="">
                                            @else
                                                <img src="{{ URL::asset('img/pegawai/male.png') }}" class="rounded-circle bg-light" alt="">
                                            @endif
                                    @else
                                        <img src="{{ URL::asset('img/inventaris/'.$inventaris->foto) }}" class="bg-light">
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
                                <div class="card-profile-stats d-flex justify-content-center">

                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $inventaris->name }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $inventaris->description }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Inagata Technosmith
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit inventaris') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('barang/'.$inventaris->id.'/update') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body text-left">
                                {{ csrf_field() }}

                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" placeholder="Nama lengkap inventaris" value="{{ $inventaris->name }}" class="form-control form-control-alternative" required autofocus>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="jumlah">{{ __('Jumlah') }}</label>
                                                <input type="number" name="jumlah" value="{{ $inventaris->jumlah }}" placeholder="Kelas" id="kelas" class="form-control form-control-alternative" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label class="form-control-label" for="foto">{{ __('Foto Barang ') }}</label>
                                                <input type="file" name="foto" id="foto" class="form-control form-control-alternative" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="description">{{ __('Deskripsi') }}</label>
                                        <textarea name="description" id="description" placeholder="Masukkan Deskripsi inventaris" class="form-control form-control-alternative" required rows="4">{{ $inventaris->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary px-5">Save</button>
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
