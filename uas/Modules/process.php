<?php
    session_start();
    include('./dbconfig.php');
    global $customer_info, $table_info, $reservation_detail;
    ?>
    <head>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript"></script>
    </head>
    <body>
        
    </body>
    <?php
    if(isset($_POST['submit']) && ($_SESSION['token'] === $_POST['token'])){
        $reserveData = new stdClass();
        $reserveData -> name    = $_POST['first_name']." {$_POST['last_name']}";
        $reserveData -> email   = $_POST['email'];
        $reserveData -> phone   = $_POST['phone'];
        $reserveData -> people  = $_POST['people'];
        $reserveData -> datetime = date_format(date_create($_POST['reser_date']." ".$_POST['reser_time'].":00:00"), "Y-m-d H:i:s");
        $reserveData -> notes   = $_POST['reser_notes'];
        $reserveData -> auth_token = bin2hex($_POST['first_name']." {$_POST['last_name']}");
        
        $reserJson = json_encode($reserveData);

        $customerData = json_decode($reserJson, true);
        foreach ($customerData as $key => $value) {
            setcookie($key, $value, time() + 60*3, "/");
        }
        # Check If Customer Already Reserved
        $resultCustomer = mysqli_query($conn, "SELECT * FROM  $customer_info WHERE customer_name = '{$customerData['name']}'");
        $check = (mysqli_num_rows($resultCustomer) > 0) ? "reserved" : "not reserved";
        if($check === "reserved"){
            mysqli_close($conn);
            ?>
                    <script type="text/javascript">
                        Swal.fire({
                            icon:"error",
                            title: "Oops...",
                            text:"It looks like you already reserved with us"
                        }).then(() => {
                                        window.history.back();
                                    });
                    </script>
            <?php
        }else{
            # Check If Any Table Available
            $resultTable = mysqli_query($conn, "SELECT * FROM $table_info WHERE availability='true' AND capacity = {$customerData['people']}");
            if($resultTable === false){
                $limit = $customerData['people']*2;
                $resultTable = mysqli_query($conn, "SELECT * FROM $table_info WHERE availability='true' AND capacity <= '$limit'");
            }
            $checkTable = (mysqli_num_rows($resultTable) > 0)  ? "Table Available" : "Table Not Available" ;
            if($checkTable === "Table Available"){
                $table = mysqli_fetch_assoc($resultTable);
                $query1 = "INSERT INTO $customer_info (customer_name, customer_email, customer_phone, reservation_people, reservation_time, reservation_note, customer_token) 
                VALUES ('{$customerData['name']}', '{$customerData['email']}', '{$customerData['phone']}', '{$customerData['people']}', '{$customerData['datetime']}', '{$customerData['notes']}', '{$customerData['auth_token']}'); ";
                $query2 = "UPDATE $table_info SET availability='false' WHERE id='{$table['id']}';";
                $query3 = "INSERT INTO $reservation_detail (table_id, customer_name) 
                VALUES ('{$table['id']}', '{$customerData['name']}')";
                $resultQuery1 = mysqli_query($conn, $query1);
                $resultQuery2 = mysqli_query($conn, $query2);
                $resultQuery3 = mysqli_query($conn, $query3);
                $id = bin2hex(mysqli_insert_id($conn)); // Get last insert ID
                if(!$resultQuery1 && !$resultQuery2 && !$resultQuery3){
                    die("Something went wrong   : ".mysqli_error($conn));
                }else{
                    $token = $customerData['auth_token'];
                    header("Location: ./reservation.php?id={$id}&tk={$token}");
                }
            }else{
                mysqli_close($conn);
                ?>
                    <script type="text/javascript">
                        Swal.fire({
                                icon:"error",
                                title:"Sorry",
                                text:"It seems that there aren't any table available for you"
                            }).then(() => {
                                window.history.back();
                            })
                    </script>
                <?php
            }
        }

    }else{
        mysqli_close($conn);
        ?>
        <script>
            Swal.fire({
                icon:"info",
                title:"Information",
                text:"Please Fill Out Reservation Form First !"
            }).then(() => {
                window.location.href="../reserve.php";
            });
        </script>
        <?php
    }
?>  

