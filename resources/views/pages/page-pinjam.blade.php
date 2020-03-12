<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpan Pinjam</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<style type="text/css">
    .img-box{
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .image-prev{
        cursor: pointer;
    }
    .btn-bot{
        margin-top: 77px;
    }
    .text-small{
        font-size: small;
        color: red;
    }
    .txt-header{
        font-size: 14px;
        line-height: 17px;
        font-style: normal;
        font-weight: bold;
        text-align: center;
        color: #333333;
    }
    .txt-subheader{
        font-size: 12px;
        line-height: 16px;
        font-style: normal;
        font-weight: 600;
        text-align: center;
        color: #333333;
    }
    .txt-title{
        font-size: 14px;
        line-height: 17px;
        font-style: normal;
        font-weight: 600;
        text-align: center;
        color: #333333;
    }
    .txt-subtitle{
        font-size: 12px;
        line-height: 15px;
        font-style: normal;
        font-weight: 500;
        text-align: center;
        color: #333333;
    }
    .txt-no-transaksi{
        font-size: 32px;
        line-height: 39px;
        font-style: normal;
        font-weight: 600;
        text-align: center;
        color: #333333;
    }
    .txt-judul{
        font-size: 26px;
        line-height: 32px;
        font-style: normal;
        font-weight: 600;
        text-align: center;
        color: #333333;
    }
</style>
</head>
<body>

    @if (session('error'))
        <div class="alert alert-danger position-fixed w-100" style="top: 0; left: 0; z-index: 100;">
            {{ session('error') }}
        </div>
    @endif

    @include('pages.nav.navbar')

    <div class="container pt-5 mt-4">
        <div class="alert" hidden="" role="alert">
            <strong><span id="txt_alert"></span></strong>
        </div>
        <div class="row">
            <form id="form">
            <div class="col-md-12">
                <h3>Peminjaman </h3>
                <div class="row">
                    <div class="col-md-8">
                            {{ csrf_field() }}
                            <div class="col-lg-12 mt-5">
                                <div class="row">
                                    <input type="hidden" id="kode_transaksi">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Barang</label>
                                            <input type="text" readonly="" name="nama_barang" id="nama_barang" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" id="nama_peminjam" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone_peminjam">Nomor HP</label>
                                            <input type="number" name="phone_peminjam" id="phone_peminjam" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Instansi</label>
                                            <input type="text" name="instansi" id="instansi" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah </label>
                                            <input type="number" readonly="" name="jumlah" id="jumlah" required class="form-control" min="1" onkeyup="number_cek(this)">
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pengembalian">Pengembalian</label>
                                            <input type="date" name="pengembalian" id="pengembalian" required class="form-control">
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="alert alert-danger" role="alert">
                                    <strong>Kosong, Dipinjam semua</strong>
                                </div>
                                <div class="alert alert-info" role="alert">
                                    <strong>Ada, tersedia barang</strong>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name">Nama Inventaris</label>
                                            <input type="text" disabled name="name" id="name" required class="form-control" >
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Jumlah</label>
                                            <input type="number" name="" id="" required class="form-control"  disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Deskripsi</label>
                                    <textarea name="tujuan" required id="tujuan" disabled class="form-control" rows="2"></textarea>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-4 pt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nama_peminjam">Kode Barang</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="kode_barang" style="text-transform:uppercase" id="kode_barang"required class="form-control">
                                        <span class="text-small" hidden="">Kode tidak ditemukan!</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="btn_cari" class="btn btn-primary w-100" onclick="search_inv()"><i class="fas fa-search"></i> Cari</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <div class="position-sticky" style="top: 100px">
                                            <div class="w-100 img-box" style="height: 300px;">
                                                <img id="image_prev" name="image_prev" src="{{ URL::asset('img/assets/icon/camera.png')  }}">
                                                <input type="hidden" name="image" id="image" class="image">
                                            </div>
                                        </div>
                                        <button type="button" id="btn_snapshot" onclick="run_snapshot()" class="btn btn-danger px-5 rounded-0">Ambil foto</button>

                                    </div>
                                </div>
                                <div class="col-md-6 btn-bot" style="margin-top: 77px;">
                                    <div class="form-group text-center">
                                        <div id="btn_left">
                                            <button type="button" onclick="lihat_struk()" class="btn btn-default px-5 rounded-0 btn-1">Reset</button>
                                            <!-- <button type="button" onclick="reset_input('form')" class="btn btn-default px-5 rounded-0 btn-1">Reset</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 btn-bot">
                                    <div class="form-group text-center">
                                        <div id="btn_right">
                                            <button type="submit" class="btn btn-success px-5 rounded-0 btn-2">Pinjam</button>                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_camera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Foto Peminjam</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center position-relative">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="d-inline-block text-center">
                            <div id="my_camera" class="d-inline-block ml-4 w-100"></div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary position-absolute px-5" id="submit_form" style="bottom: -70px; right: 0px" disabled>Lanjut</button> -->
                        <div id="results" class="position-absolute w-100 text-center" style="z-index: 100; top: 0"></div>
                    </form>
                    <button class="btn btn-default my-4" onclick="reset()">Reset</button>
                    <button class="btn btn-warning my-4" onclick="take_snapshot()">Capture</button>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="set_snapshot()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_struk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center position-relative">
                    <span class="txt-header">SMK MODERN AR - RIFA'IE</span><br>
                    <span class="txt-subheader">SISTEM INFORMASI</span><br>
                    <span class="txt-subheader">BUKU TAMU DAN PINJAMAN</span><br>                        
                </div>
                <div class="col-md-12 text-center position-relative">
                    <span class="txt-title">Kode Barang</span><br>
                    <span class="txt-no-transaksi" id="txt_kode_transaksi"></span><br>
                </div>
                <div class="col-md-6 text-center position-relative">
                    <span class="txt-title">Nama Lengkap</span><br>
                    <span class="txt-subtitle" id="txt_nama_lengkap"></span><br>
                </div>
                <div class="col-md-6 text-center position-relative">
                    <span class="txt-title">Instansi</span><br>
                    <span class="txt-subtitle" id="txt_instansi"></span><br>
                </div>
                <div class="col-md-12 text-center position-relative">
                    <span class="txt-judul">Data Pinjaman</span><br>
                </div>
                <div class="col-md-6 text-center position-relative">
                    <span class="txt-title">Nama Barang</span><br>
                    <span class="txt-subtitle" id="txt_nama_barang"></span><br>
                </div>
                <div class="col-md-6 text-center position-relative">
                    <span class="txt-title">Jumlah</span><br>
                    <span class="txt-subtitle" id="txt_jumlah"></span><br>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('webcamjs/webcam.min.js') }}"></script>

    <script language="JavaScript">
        var data_inv = "{{ $inventaris }}";
        var data_inventaris = JSON.parse(data_inv.replace(/&quot;/g,'"'));
        console.log(data_inventaris)
        // Configure a few settings and attach camera
        $(document).ready(function() {
            $('#form').off().submit(function (e) {
                e.preventDefault();
                var data = $("#form").serializeArray();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/pinjam/barang') }}", 
                    type: "POST", 
                    // dataType: 'json',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    // contentType: false,
                    // processData: false,
                    success: function(data)    
                    {
                        var data = JSON.parse(data)
                        $('.alert').prop('hidden',false);
                        $('#txt_alert').html(data.msg);
                        if (data.status == true) {
                            $('.alert').addClass('alert-info');
                            $('#form').find(':input').each(function(){
                              $(this).prop('readonly',true);
                            })
                            var btn_lihat = `<button type="button" onclick="lihat_struk()" class="btn btn-warning px-5 rounded-0 btn-3">Lihat</button>`;
                            var btn_simpan = `<button type="button" onclick="" class="btn btn-primary px-5 rounded-0 btn-3">Selesai</button>`;
                            $('#btn_left').html('')
                            $('#btn_right').html('')
                            $('#btn_left').append(btn_lihat)
                            $('#btn_right').append(btn_simpan)
                            $('#btn_snapshot').prop('hidden',true);
                            $('#btn_cari').prop('hidden',true);
                            setTimeout(function() {
                                $('.alert').prop('hidden',true);
                            }, 2000);
                        }else{
                            $('.alert').addClass('alert-danger');
                            $('#txt_alert').html(data.msg);
                            $('.alert').prop('hidden',false);

                        }
                    }
                  });
            });

        });

        function run_snapshot() {
            $('#modal_camera').modal('show');
            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
        }

        function reset() {
            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
            $('#results').hide();
        }

        function set_snapshot() {
            var snapshot = $('#imageprev').attr('src');
            $('#image_prev').attr('src',snapshot);
            $('#image_prev').addClass('w-100');
            $('#modal_camera').modal('hide');
        }

        function take_snapshot() {
            $('#results').show();
            $('#submit_form').removeAttr("disabled");
            Webcam.snap( function(data_uri) {
                var imageCode = $('#image').val(data_uri);
                document.getElementById('results').innerHTML =
                '<img id="imageprev" class="image-prev" src="'+data_uri+'"/>';
            } );
            $('#imageprev').on('click',function () {
                reset();
            })
            Webcam.reset();
        }

        function search_inv() {
            var value = $('#kode_barang').val();

            var item = data_inventaris.find(item => item.kode_barang === value);
            if (item != undefined) {
                $('#nama_barang').val(item.name);
                $('#jumlah').data("max",item.jumlah);
                $('#jumlah').prop("readonly",false);
                $('.text-small').prop('hidden',true);
            }else{
                $('.text-small').prop('hidden',false);
            }
        }

        function number_cek(e) {
            var max = $(e).data('max');
            if (e.value>max) {
                $(e).val(max);
            }
        }

        function reset_input(form) {
            $('#'+form).find(':input').each(function(){
              $(this).val("")
            })
        }
        function lihat_struk() {
            $('#modal_struk').modal()
            $('#txt_kode_transaksi').html($('#kode_transaksi').val())
            $('#txt_nama_lengkap').html($('#nama_peminjam').val())
            $('#txt_instansi').html($('#instansi').val())
            $('#txt_nama_barang').html($('#nama_barang').val())
            $('#txt_jumlah').html($('#jumlah').val())
        }
    </script>
</body>
</html>
