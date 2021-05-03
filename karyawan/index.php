<?php
    include_once("./dbconfig.php");
    include_once("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
</head>
<body>
    <div>
        <?php fetchData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable)?>
    </div>
</body>
</html>