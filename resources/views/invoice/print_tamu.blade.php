<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpan Pinjam</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

</head>
<body>

    <table class="table" style="font-size: .4rem">
        <thead class="thead-dark">
            <tr>
                <td>Nama Tamu</td>
                <td>{{ $tamu->name }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tujuan Tamu</td>
                <td>{{ $tamu->tujuan }}</td>
            </tr>
            <tr>
                <td>Pegawai yang dituju</td>
                <td>{{ $pegawai->name }}</td>
            </tr>
            <tr>
                <td>Waktu bertamu</td>
                <td>{{ $tamu->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
