<?php
    include('../Modules/dbconfig.php');
    $table = $table_info;
    $result = mysqli_multi_query($conn, "UPDATE $table SET availability='true' WHERE availability='false'");
    if(!$result){
        die("Something went wrong : ".mysqli_error($conn));
    }


    mysqli_close($conn);
?>