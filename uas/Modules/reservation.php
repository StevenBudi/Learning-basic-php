<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript"></script>
</head>
<body>
    
</body>
<?php
    function fetchReserDetails($connection, $table, $id){
        $reservation_result = mysqli_query($connection, "SELECT * FROM $table WHERE reservation_id='$id'");
        if(!$reservation_result){
            die("Something went wrong   : ".mysqli_error($connection));
        }else{
            return mysqli_fetch_assoc($reservation_result);
        }
    }

    function fetchCustomerInfo($connection, $table, $data){
        $customer_result = mysqli_query($connection, "SELECT * FROM $table WHERE customer_name = '{$data['customer_name']}'");
        if(!$customer_result){
            die("Something went wrong   : ".mysqli_error($connection));
        }else{
            return mysqli_fetch_assoc($customer_result);
        }
    }

    function updateCustomerInfo($connection, $table, $data1, $data2){
        $updateQuery = "UPDATE $table SET reservation_note = '{$_POST['notes']}', customer_phone= '{$_POST['phone']}' WHERE customer_name = '{$data1['customer_name']}'";
        $res3 = mysqli_query($connection, $updateQuery);
        if(!$res3){
            die("Something went wrong : ".mysqli_error($connection));
        }else{
            ?>
                <script>
                    Swal.fire({
                        icon:"success",
                        title: "Success!",
                        text:"Your data has been succesfully updated"
                    })
                </script>
            <?php
            $temp = fetchCustomerInfo($connection, $table, $data2);
            return $temp;
        }
    }

    function getOAuth($connection, $table1, $table3, $id){
        $authQuery = mysqli_query($connection, "SELECT $table1.customer_token FROM $table1, $table3 WHERE $table3.reservation_id = $id AND $table1.customer_name = $table3.customer_name");
        if(!$authQuery){
            return false;
        }else{
            return mysqli_fetch_assoc($authQuery)['customer_token'];
        }
    }

    error_reporting(E_ERROR | E_PARSE);
    include('./dbconfig.php');
    $table1 = $table_customer;
    $table2 = $table_info;
    $table3 = $reservation_detail;
    $validation = intval(hex2bin($_GET['id']));
    $auth = getOAuth($conn, $table1, $table3, $validation);
    if($auth === $_GET['tk']){
            $res = fetchReserDetails($conn, $table3, $validation);
            var_dump($res);
            $res2 = fetchCustomerInfo($conn, $table1, $res);
            var_dump($res2);
            if(isset($_POST['update'])){
                $res2 = updateCustomerInfo($conn, $table1, $res2, $res);
            }
            ?>
                <div class="container container-fluid">
                    <form action="reservation.php?id=<?php echo($_GET['id'])?>&tk=<?php echo($_GET['tk'])?>" method="post" class="form-control">
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
                                <td>
                                    <?php
                                    if($res['status'] === 'reserved'){
                                        ?>
                                        <input type="text" name="phone" class="form-control" maxlength="15" value=<?php echo($res2['customer_phone'])?>>
                                        <?php
                                    }else{
                                        echo($res2['customer_phone']);
                                    }
                                    ?>
                                </td>
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
                                <td>
                                    <?php
                                    if($res['status'] === 'reserved'){
                                        ?>
                                        <textarea name="notes" cols="75" rows="3" class="form-control"><?php echo($res2['reservation_note'])?></textarea>
                                        <?php
                                    }else{
                                        echo($res2['reservation_note']);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-primary" name="update">Update</button></td>
                                <td><a href="./cancel_reservation.php?id=<?php echo($_GET['id'])?>&tk=<?php echo($_GET['tk'])?>" class="btn btn-danger" style="float: right;">Cancel</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            <?php
    }else{
        ?>
        <script>
            Swal.fire({
                icon:"error",
                title:"Error",
                text:"You are not authorized to view this page"
            }).then(() =>{
                window.history.back();
            });
        </script>
        <?php
    }
    
    
    /*
    TODO
    1. check reservation dates if passed dont allow update just view (done using status)
    2. using token to cancel and update (done)
    3. Probably use token as well to view reservation information (done)

    */

    mysqli_close($conn);
?>