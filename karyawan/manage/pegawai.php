<?php
    include_once('./connection.php');
    include_once('./dbconfig.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Pegawai <?php echo $_GET['id'];?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <style>
            .bg-dark{
                background-color: #212529;
                opacity: 70%;
            }
        </style>
    </head>
    <body style="background-image: url(./asset/pgw.jpg);background-position: center;background-repeat: no-repeat;">
        
    
    <?php
    getData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $_GET['id']);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
?>