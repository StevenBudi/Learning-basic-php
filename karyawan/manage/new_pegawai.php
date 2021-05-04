<?php
    include_once("./dbconfig.php");
    include_once("./connection.php");

    if(isset($_POST['daftar'])){
        $data = [
            "nama" => $_POST['nama'],
            "email" => $_POST['email'],
            "telp" => $_POST['telepon'],
            "gender" => $_POST['gender'],
            "tempat" => $_POST['tempat'],
            "tanggal" => $_POST['tanggal'],
            "alamat" => $_POST['alamat']
        ];

        // var_dump($data);
        postData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $data);
        header("Location: ..");
        
    }else{
        header("Location:form.html");
    }




?>