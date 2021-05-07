<?php
    include_once("./dbconfig.php");
    if(isset($_POST['submit'])){
        $query = "INSERT INTO";
        $search = mysqli_query($conn, $query);
    }else{
        header("Location: ../index.php");
    }

    mysqli_close($conn);
?>