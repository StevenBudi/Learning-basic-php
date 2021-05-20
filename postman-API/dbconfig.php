<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'universitas';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        die("Connection Error   : ".mysqli_connect_error($conn));
    }
?>