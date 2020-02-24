<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.min.css') }}">

<body>

    @if (session('error'))
        <div class="alert alert-danger position-fixed w-100" style="top: 0; left: 0;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success position-fixed w-100" style="top: 0; left: 0;">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul style="list-style: none">
                    <li>Dashboard</li>
                    <li>List Pegawai</li>
                    <li>List Siswa</li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <canvas id="myTamu" width="75%" height="25px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ URL::asset('js/Chart.js') }}"></script>

    <script>
        var ctx = document.getElementById("myTamu").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['6 Hari lalu ','5 Hari lalu', '4 Hari lalu', '3 Hari lalu', '2 Hari lalu', 'Kemarin', 'Hari ini'],
                datasets: [{
                    label: 'Laporan tamu selama seminggu terakhir',
                    data: [
                        <?php echo json_encode($tamuday[6]); ?>,
                        <?php echo json_encode($tamuday[5]); ?>,
                        <?php echo json_encode($tamuday[4]); ?>,
                        <?php echo json_encode($tamuday[3]); ?>,
                        <?php echo json_encode($tamuday[2]); ?>,
                        <?php echo json_encode($tamuday[1]); ?>,
                        <?php echo json_encode($tamuday[0]); ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }];
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }];
                }
            }
        });
    </script>

</body>
</html>
