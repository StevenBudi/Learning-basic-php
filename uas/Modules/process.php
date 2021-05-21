<?php
    session_start();
    include('./dbconfig.php');
    $table1 = $table_customer;
    $table2 = $table_info;
    $table3 = $reservation_detail;
    ?>
    <head>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript">
            alert("Test");
        </script>
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
        # Check Data
        try {
            $resultCustomer = mysqli_query($conn, "SELECT * FROM  $table1 WHERE customer_name = '{$customerData['name']}'");
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
                try {
                    $resultTable = mysqli_query($conn, "SELECT * FROM $table2 WHERE availability='true' AND capacity = {$customerData['people']}");
                    if($resultTable === false){
                        $limit = $customerData['people']*2;
                        $resultTable = mysqli_query($conn, "SELECT * FROM $table2 WHERE availability='true' AND capacity <= '$limit'");
                    }
                    $checkTable = (mysqli_num_rows($resultTable) > 0)  ? "Table Available" : "Table Not Available" ;
                    if($checkTable === "Table Available"){
                        $table = mysqli_fetch_assoc($resultTable);
                        // var_dump($customerData);
                        // echo("<br/>");
                        // var_dump($table);
                        $query1 = "INSERT INTO $table1 (customer_name, customer_email, customer_phone, reservation_people, reservation_time, reservation_note, customer_token) 
                        VALUES ('{$customerData['name']}', '{$customerData['email']}', '{$customerData['phone']}', '{$customerData['people']}', '{$customerData['datetime']}', '{$customerData['notes']}', '{$customerData['auth_token']}'); ";
                        $query2 = "UPDATE $table2 SET availability='false' WHERE id='{$table['id']}';";
                        $query3 = "INSERT INTO $table3 (table_id, customer_name) 
                        VALUES ('{$table['id']}', '{$customerData['name']}')";
                        $resultQuery1 = mysqli_query($conn, $query1);
                        $resultQuery2 = mysqli_query($conn, $query2);
                        $resultQuery3 = mysqli_query($conn, $query3);
                        $id = bin2hex(mysqli_insert_id($conn)); // using LAST_INSERT_ID
                        if(!$resultQuery1 && !$resultQuery2 && !$resultQuery3){
                            die("Something went wrong   : ".mysqli_error($conn));
                        }else{
                            $token = $customerData['auth_token']; // using customer_token
                            // echo("This is a point to mail the customer or notif the customer");
                            
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
                } catch (\Throwable $th) {
                    mysqli_close($conn);
                    throw $th;
                    die("Something went wrong : ".mysqli_error($conn).mysqli_errno($conn));
                }
            }
        } catch (\Throwable $th) {
            mysqli_close($conn);
            throw $th;
            die("Something went wrong   : ".mysqli_errno($conn));
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
            // alert("Please Fill out reservation form first !").then(() => {window.location.href="../reserve.php"});
        </script>
        <?php
    }

/*
    TODO

    Part 1 : 
    process user form
        - check if user already reserved or not (done)
        - check date and reservation time (change to same day reservation)

    redirect/sent user email for confirmation/cancellation (using crsf token) if success (unsuccesful :( )
    sent back user to reserve page if fail but kept user input intact with input field (not yet probably using cookie)

    Part 2 :
    assign reservation to table based on people (done)
    alter table availability and input reservation information if success (done)
    

    Part 3 :
    decide reservation option 
    - same day reservation (this one)
    - 2 weeks notice reservation
    if 2 weeks notice find way to save reservation without alter restaurant_tabel table
    both same day and 2 weeks require availability to be reset at 15:00 and 24:00 (manual job)
*/

?>  

