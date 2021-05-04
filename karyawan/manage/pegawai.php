<?php
include_once('./connection.php');
include_once('./dbconfig.php');
$karyawan = getData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai <?php echo $_GET['id']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .bg-dark {
            background-color: rgba(33, 37, 41, 0.75) !important;
        }
    </style>
</head>

<body style="background-image: url(../asset//pgw.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;width:100%;height: 100%;box-sizing: border-box;">

    <div class="container container-fluid" style="display: flex;justify-content: center;align-items: center;">
        <div class="card text-white bg-dark mb-3 mt-5" style="width:75%; height: 50%;">
            <div class="card-body">
                <h1 class="card-title">Data Karyawan - <?php echo $karyawan['id_karyawan']; ?></h1>
                <div class="card-text">
                    <table style="color: white;" class="table table-borderless">
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $karyawan['nama'];  ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $karyawan['email'];  ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><?php echo $karyawan['telepon'];  ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $karyawan['alamat'];  ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $karyawan['jenis_kelamin'];  ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><?php echo $karyawan['tempat_lahir'] . ", " . $karyawan['tanggal_lahir'];  ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
<?php
?>