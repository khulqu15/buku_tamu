@extends('layouts.frontend')

@section('content')

@if (session('error'))
    <div class="alert alert-danger alert-dismissible message-top rounded-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible message-top rounded-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif


<div class="container-fluid bg-image-home position-relative">
    <div class="bgo-dark position-absolute w-100 h-100 bgo-absolute"></div>
    <div class="container text-center py-5">
        <div class="row">
            <div class="col-md-12 text-center pb-5 position-relative">
                <form action='{{ url('/pinjam/'.$id.'/'.$kode.'/foto/clicked') }}' method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="d-inline-block text-center position-relative">
                        <div class="webcam-border">
                            <div id="my_camera" class="d-inline-block rounded position-relative overflow-hidden"></div>
                            <div id="results" class="position-absolute text-center rounded overflow-hidden" style="z-index: 50; top: 0"></div>
                        </div>
                    </div>
                    <input type="hidden" name="image" id="image" class="image">
                    <button type="submit" class="btn btn-primary position-absolute px-5 my-5" id="submit_form" style="bottom: 0px; right: 0px" disabled>Lanjut</button>
                </form>
                <button class="btn btn-light px-5 my-4" onclick="reset()">Reset</button>
                <button class="btn btn-success px-5 my-4" onclick="take_snapshot()">Click foto</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
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
@endsection
