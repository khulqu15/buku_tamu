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
                <td>Kode transaksi</td>
                <td>{{ $transaksi->kode_transaksi }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Barang yang dipinjam</td>
                <td>{{ $inventaris->name }} - {{ $inventaris->kode_barang }}</td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>{{ $transaksi->pengembalian }}</td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>{{ $transaksi->jumlah }}</td>
            </tr>
        </tbody>
    </table>

    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
