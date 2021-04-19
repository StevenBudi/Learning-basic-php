<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    /*
    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3310);

    if ($con -> connect_error){
        die("Koneksi Gagal : ".$con -> connect_error);
    }else{
        echo "Koneksi Berhasil";
    }

    $con -> close();
    */
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3310);

    if (!$conn){
        die("Koneksi gagal : ".mysqli_connect_error());
    }else{
        echo("Koneksi Berhasil");
    }

    mysqli_close($conn);