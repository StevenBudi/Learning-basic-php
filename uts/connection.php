<?php
    function insertScore($dbhost, $dbuser, $dbpass, $dbname, $port, $NAMA, $SCORE){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
        if ($conn) {
            echo "<script>console.log('Koneksi Berhasil');</script>";
        } else {
            $err_msg = mysqli_connect_error();
            die("<script>console.log('Koneksi Gagal : '.$err_msg);</script>");
        }
        $query = "INSERT INTO highscore (Player, Score)
            VALUES ('$NAMA', '$SCORE')";
        if (mysqli_query($conn, $query)){
            echo"<script>console.log('Input Data Berhasil');</script>";
        }else{
            $err = mysqli_error($conn);
            die("<script>console.log('Input Data Gagal : '.{$err});</script>");
        }
    
        mysqli_close($conn);
    }

    function fetchData($dbhost, $dbuser, $dbpass, $dbname, $port){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
        if ($conn) {
            echo "<script>console.log('Koneksi Berhasil');</script>";
        } else {
            $err_msg = mysqli_connect_error();
            die("<script>console.log('Koneksi Gagal : '.$err_msg);</script>");
        }

        $query = "SELECT * FROM highscore ORDER BY Score LIMIT 10";
        $search = mysqli_query($conn, $query);
        if (mysqli_num_rows($search) > 0) {
            while ($row = mysqli_fetch_assoc($search)) {
                echo($row['Player']);
                echo($row['Score']);
            }
        }else{
            echo("Data tidak ditemukan");
        }
        mysqli_close($conn);     
    }
?>