<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ambil Foto</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <style>
        #my_camera{
            width: 640px;
            height: 480px;
            border: 1px solid black;
        }
    </style>

</head>
<body>
    @if (session('error'))
        <div class="alert alert-danger position-fixed w-100" style="top: 0; left: 0; z-index: 100;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success position-fixed w-100" style="top: 0; left: 0; z-index: 100;">
            {{ session('success') }}
        </div>
    @endif
    <div class="container text-center mt-5 pt-5">
        <div class="row">
            <div class="col-md-12 text-center position-relative">
                <form action="{{ url('/pinjam/'.$id.'/'.$kode.'/foto/clicked') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="d-inline-block text-center">
                        <div id="my_camera" class="d-inline-block ml-4"></div>
                    </div>
                    <input type="hidden" name="image" id="image" class="image">
                    <button type="submit" class="btn btn-primary position-absolute px-5" id="submit_form" style="bottom: -70px; right: 0px" disabled>Lanjut</button>
                    <div id="results" class="position-absolute w-100 text-center" style="z-index: 100; top: 0"></div>
                </form>
                <button class="btn btn-primary my-4" onclick="reset()">Reset</button>
                <button class="btn btn-primary my-4" onclick="take_snapshot()">Click foto</button>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('webcamjs/webcam.min.js') }}"></script>

    <script language="JavaScript">

        // Configure a few settings and attach camera
        $(document).ready(function() {
            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
        });

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

        // A button for taking snaps

        function take_snapshot() {
        $('#results').show();
        $('#submit_form').removeAttr("disabled");
         // take snapshot and get image data
        Webcam.snap( function(data_uri) {
         // display results in page
            var imageCode = $('#image').val(data_uri);
            console.log(imageCode);
            document.getElementById('results').innerHTML =
            '<img id="imageprev" src="'+data_uri+'"/>';
            } );

            Webcam.reset();
        }

       </script>

</body>
</html>
