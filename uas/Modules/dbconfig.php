<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "restaurant";
    $port   = 3306;
    $table_customer  = "reservation_customer";
    $table_info = "restaurant_table";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

    if(!$conn){
        die("Connection Failed  : ".mysqli_connect_error($conn));
    }
?>