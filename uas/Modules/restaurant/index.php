<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <script src="../../asset/js/restaurant.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript"></script>
</head>
<body>
    <h1>Admin Page</h1>
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['login'])){
        include('../dbconfig.php');
        $table = $reservation_detail;
        $table2 = $table_customer;
        //SELECT * FROM reservation_detail JOIN reservation_customer WHERE reservation_customer.customer_name = reservation_detail.customer_name AND DATE(reservation_customer.reservation_time) = CURDATE() ORDER BY reservation_detail.reservation_id 
        $all_data = mysqli_query($conn, "SELECT * FROM $table JOIN $table2 WHERE DATE($table2.reservation_time) = CURDATE() AND $table.customer_name = $table2.customer_name ORDER BY $table.reservation_id");
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
                    <?php
                        $id = 'reser_status'.$row['reservation_id']
                    ?>
                    <select name="reser_status" id=<?php echo($id)?> onclick="prevValue = this.value; this.onclick=null;" onchange="
                    Swal.fire({
                        title: 'Change Reservation Status ?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!',
                        cancelButtonText:'Nope!'
                    }).then((result) => {
                        if(result.isConfirmed){
                            statusChange('<?php echo($id)?>');
                        }else if (result.dismiss === Swal.DismissReason.cancel){
                            revertValue('<?php echo($id)?>');
                        }
                    }).then(() => {location.reload()});">
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
    }else{
        $user = 'admin';
        $pass ="8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918";
        ?>
        <form action="index.php" method="post">
            <h1>Login</h1>
            <table>
                <tr>
                    <td>User</td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <button type="submit" name="login">Login</button>
        </form>
        <?php
        if(isset($_POST['login'])){
            if($_POST['user'] === $user && hash("sha256", $_POST['password']) === $pass){
                $_SESSION['login'] = true;
                header("Location: index.php");
            }else{
                ?>
                <script>
                    Swal.fire({
                        icon:"error",
                        title:"Login Failed",
                        text:"Check Your User and Password !"
                    })
                </script>
                <?php
            }
        }
    }
    
// Alter reservation information

/*
TODO
- limit display using date
- button to change status
- detail page
*/

?>