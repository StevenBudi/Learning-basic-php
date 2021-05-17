<?php
    include('../Modules/dbconfig.php');
    $table = $table_info;
    $table2 = $reservation_detail;
    $result = mysqli_multi_query($conn, "UPDATE $table SET availability='true' WHERE availability='false';DELETE FROM $table2 WHERE status='check-out' OR status='cancelled';");
    if(!$result){
        die("Something went wrong : ".mysqli_error($conn));
    }


    mysqli_close($conn);
?>