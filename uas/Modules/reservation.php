<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
<?php
    session_start();
    include('./dbconfig.php');
    $table1 = $table_customer;
    $table2 = $table_info;
    $table3 = $reservation_detail;

    $validation = intval(hex2bin($_GET['id'])) + 1;
    // echo($validation."<br/>");
    $reservation_result = mysqli_query($conn, "SELECT * FROM $table3 WHERE reservation_id='$validation'");
    if(!$reservation_result){
        die("Something went wrong   : ".mysqli_error($conn));
    }else{
        $res = mysqli_fetch_assoc($reservation_result);
        // var_dump($res);
        $customer_result = mysqli_query($conn, "SELECT * FROM $table1 WHERE customer_name = '{$res['customer_name']}'");
        if(!$customer_result){
            die("Something went wrong   : ".mysqli_error($conn));
        }else{
            $res2 = mysqli_fetch_assoc($customer_result);
            // echo("<br/>");
            // var_dump($res2);
            ?>
            <div class="container container-fluid">
                <form action="reservation.php" method="post" class="form-control">
                    <center><h1>Reservation Information</h1></center>
                    <table class="table table-striped" style="table-layout:auto;">
                        <tr>
                            <td>Reservation Id</td>
                            <td><?php echo($res['reservation_id'])?></td>
                        </tr>
                        <tr>
                            <td>Table</td>
                            <td><?php echo($res['table_id'])?></td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td><?php echo($res2['customer_name'])?></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td><?php echo($res2['customer_email'])?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><input type="text" name="phone" value=<?php echo($res2['customer_phone'])?> class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Number Of People</td>
                            <td><?php echo($res2['reservation_people'])?></td>
                        </tr>
                        <tr>
                            <td>Reservation Time</td>
                            <td><?php echo($res2['reservation_time'])?></td>
                        </tr>
                        <tr>
                            <td>Notes</td>
                            <td><textarea name="notes" cols="75" rows="3" class="form-control"><?php echo($res2['reservation_note'])?></textarea></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-primary" name="update">Update</button></td>
                            <td><a href="./cancel_reservation.php?id=<?php echo($_GET['id'])?>&tk=<?php echo($_SESSION['token'])?>" class="btn btn-danger" style="float: right;">Cancel</a></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
        }
    }
    
    /*
    TODO
    1. check reservation dates if passed dont allow update just view
    2. using token to cancel and update
    3. Probably use token as well to view reservation information

    */

    mysqli_close($conn);
?>