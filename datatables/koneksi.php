<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'pertemuan13';
    $table  = 'tma';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$conn){
        die("Connect Error  : ".mysqli_connect_error());
    }