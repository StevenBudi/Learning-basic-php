<?php  
    include "./dbconfig.php";
    session_start();
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

    if($conn){
        echo"<script>console.log('Koneksi Sukses');</script>";
    }
    else{
        die("Koneksi Gagal : ".mysqli_connect_errno());
    }


    $query = "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$password'";
    $search = mysqli_query($conn, $query);
    var_dump($search);

    if (mysqli_num_rows($search) > 0){
        $row = mysqli_fetch_assoc($search);
        $_SESSION["status"] = "login";
        $_SESSION["nim"] = $row["nim"];
        $_SESSION["username"] = $row["username"];
        header("Location:homepage.php");
    } else{
        echo("Data Not Found");
    }



?>