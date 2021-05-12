<?php
    include_once("./dbconfig.php");
    $query = "INSERT INTO";
    $search = mysqli_query($conn, $query);

    
    mysqli_close($conn);
?>