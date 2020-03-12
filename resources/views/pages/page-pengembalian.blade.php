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
                                <input type="hidden" id="id_transaksi">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Barang</label>
                                            <input type="text" readonly="" name="nama_barang" id="nama_barang" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" readonly="" name="nama_peminjam" id="nama_peminjam" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone_peminjam">Nomor HP</label>
                                            <input type="number" readonly="" name="phone_peminjam" id="phone_peminjam" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" readonly="" name="alamat" id="alamat" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Instansi</label>
                                            <input type="text" readonly="" name="instansi" id="instansi" required class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah </label>
                                            <input type="number" readonly="" name="jumlah" id="jumlah" required class="form-control" min="1" onkeyup="number_cek(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nama_peminjam">Kode Barang</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="kode_transaksi" style="text-transform:uppercase" id="kode_transaksi"required class="form-control">
                                        <span class="text-small" hidden="">Kode tidak ditemukan!</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="btn_cari" class="btn btn-primary w-100" onclick="search_trans()"><i class="fas fa-search"></i> Cari</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <div class="position-sticky" style="top: 100px">
                                            <div class="w-100 img-box" style="height: 300px;">
                                                <img id="image_prev" name="image_prev" src="{{ URL::asset('img/assets/icon/camera.png')  }}">
                                                <input type="hidden" name="image" id="image" class="image">
                                            </div>
                                        </div>
                                        <button type="submit" id="btn_snapshot" class="btn btn-danger px-5 rounded-0">Kembalikan</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('webcamjs/webcam.min.js') }}"></script>

    <script language="JavaScript">
        var data_trans = "{{ $transaksi }}";
        var data_transaksi = JSON.parse(data_trans.replace(/&quot;/g,'"'));
        console.log(data_transaksi)
        // Configure a few settings and attach camera
        $(document).ready(function() {
            $('#form').off().submit(function (e) {
                e.preventDefault();
                var data = $("#form").serializeArray();
                var token = $('input[name="_token"]').val();
                var id = $('#id_transaksi').val();
                $.ajax({
                    url: "{{ url('/kembali/barang') }}"+"/"+id, 
                    type: "GET", 
                    data: {},
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(data)    
                    {
                        var data = JSON.parse(data)
                        $('.alert').prop('hidden',false);
                        $('#txt_alert').html(data.msg);
                        if (data.status == true) {
                            $('.alert').addClass('alert-info');
                            setTimeout(function() {
                                window.location = "{{ url('/fitur') }}";
                            }, 1500);
                        }else{
                            $('.alert').addClass('alert-danger');
                        }
                    }
                  });
            });

        });

        function search_trans() {
            var value = $('#kode_transaksi').val();

            var item = data_transaksi.find(item => item.kode_transaksi === value);
            console.log(value)
            if (item != undefined) {
                $('#id_transaksi').val(item.id);
                $('#nama_barang').val(item.name);
                $('#nama_peminjam').val(item.nama_peminjam);
                $('#phone_peminjam').val(item.phone_peminjam);
                $('#alamat').val(item.alamat);
                $('#instansi').val(item.instansi_peminjam);
                $('#jumlah').val(item.jumlah);
                $('#image_prev').attr('src',"{{ url('webcam/transaksi') }}"+"/"+item.foto);
                $('#image_prev').addClass('w-100');
                $('.text-small').prop('hidden',true);
            }else{
                $('.text-small').prop('hidden',false);
            }
        }
    </script>
</body>
</html>
