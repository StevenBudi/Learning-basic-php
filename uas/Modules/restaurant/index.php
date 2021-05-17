<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>
</body>
</html>
<?php
    include('../dbconfig.php');
    $table = $reservation_detail;
    $all_data = mysqli_query($conn, "SELECT * FROM $table ORDER BY reservation_id");
    if($all_data){
        ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Table</th>
                    <th>Status</th>
                </tr>
            
        <?php
        while($row = mysqli_fetch_assoc($all_data)){
            ?>
            <tr>
                <td><?php echo($row['reservation_id'])?></td>
                <td><?php echo($row['customer_name'])?></td>
                <td><?php echo($row['table_id'])?></td>
                <td><?php echo($row['status'])?></td>
            </tr>
            <?php
        }
        ?>
            </table>
        <?php
    }
// Alter reservation information

/*
TODO
- limit display using date
- button to change status
- detail page
*/

?>