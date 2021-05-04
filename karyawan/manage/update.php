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
        <title>Update Data Pegawai <?php echo $_GET['id']?></title>
    </head>
    <body>
        

    <?php
    updateData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $_GET['id'])
    ?>
    </body>
    </html>
?>