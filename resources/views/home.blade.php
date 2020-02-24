
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Tamu</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
    </style>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <video muted loop autoplay id="myVideo">
                    <source src="{{ URL::asset('video/1579797922-Ninno.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script>
        document.addEventListener('keypress', function() {
            window.open("{{ url('/fitur') }}")
        });
        document.addEventListener('click', function() {
            window.open("{{ url('/fitur') }}")
        });
    </script>

</body>
</html>
