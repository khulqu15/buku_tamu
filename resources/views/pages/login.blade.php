<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.min.css') }}">

</head>
<body>
    <div class="container pt-5 mt-5">
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
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-2">
                <h2 class="text-center">Login</h2>
                <form action="{{ url('/login/post') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda">
                            <div class="input-group-append bg-light">
                                <div class="input-group-text bg-light" id="view"><i class="fa fa-eye" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="my_cookie" id="cookie">
                        <label for="cookie">Ingat saya</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script>
        $('#view').click(function() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('#view').removeClass('text-dark').addClass('text-primary');
            } else {
                x.type = "password";
                $('#view').removeClass('text-primary').addClass('text-dark');
            }
        });
    </script>
</body>
</html>
