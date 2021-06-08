<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Tinggi Muka Air</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ch.php">Curah Hujan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./kekeruhan.php">Kekeruhan Air</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./status.php">Status</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container container-fluid mt-3">
            <?php
            include("./connection.php");
            $kekeruhan = mysqli_query($conn, "SELECT * FROM kekeruhan");
            $data = array();
            while ($row = mysqli_fetch_assoc($kekeruhan)) {
                array_push($data, "['{$row['waktu']}', {$row['nilai']}]");
            }
            ?>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Grafik Kekeruhan Air</h4>
                            <hr>
                            <div id="grafik">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        Highcharts.chart('grafik', {
            chart: {
                type: 'areaspline',
                zoomType: "xy",
                panKey: "alt"
            },
            title: {
                text: 'Curah Hujan'
            },
            subtitle: {
                text: 'Latihan Highcharts'
            },
            yAxis: {
                title: {
                    text: 'Curah hujan per menit'
                }
            },
            xAxis: {
                type: 'category',
                accessibility: {
                    rangeDescription: 'Waktu'
                }
            },
            tooltip: {
                pointFormat: '{point.y} mm'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.1
                },
            },
            series: [{
                name: 'Curah Hujan',
                data: [<?= join(",", $data) ?>],
                color : {
                    linearGradient : {x1:0, x2:0, y1:0, y2:1},
                    stops : [
                        [0, "#f59542"],
                        [1, "#ffffff"]
                    ]
                }
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
</body>

</html>