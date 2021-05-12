<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "restaurant";
    $port   = 3306;
    $table_customer  = "reservation_customer";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port, $table_customer)
?>