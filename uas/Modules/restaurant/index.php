<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <script src="../../asset/js/restaurant.js"></script>
</head>
<body>
    <h1>Admin Page</h1>
</body>
</html>
<?php
    include('../dbconfig.php');
    $table = $reservation_detail;
    $table2 = $table_customer;
    $all_data = mysqli_query($conn, "SELECT * FROM $table, $table2 WHERE DATE(`$table2.reservation_time`) = CURDATE() ORDER BY `$table.reservation_id`");
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
                <td>
                    <!--<?php echo($row['status'])?> -->
                    <!-- 
                        1. Change Status on database
                        2. Change display using ajax
                    -->
                    <select name="reser_status" id="reser_status" onchange="statusChange()">
                        <option value="reserved" <?php if($row['status'] === 'reserved') echo("selected")?>>Reserved</option>
                        <option value="cancelled"<?php if($row['status'] === 'cancelled') echo("selected")?>>Cancelled</option>
                        <option value="check-in" <?php if($row['status'] === 'check-in') echo("selected")?>>Check-In</option>
                        <option value="check-out"<?php if($row['status'] === 'check-out') echo("selected")?>>Check-Out</option>
                    </select>
                </td>
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