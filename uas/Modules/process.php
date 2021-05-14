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
        
        $reserJson = json_encode($reserveData);
        $customerData = json_decode($reserJson, true);
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
                        $resultQuery = mysqli_multi_query($conn, "INSERT INTO $table1 (customer_name, customer_email, customer_phone, reservation_people, reservation_time, reservation_note) 
                        VALUES ('{$customerData['name']}', '{$customerData['email']}', '{$customerData['phone']}', '{$customerData['people']}', '{$customerData['datetime']}', '{$customerData['notes']}'); 
                        UPDATE $table2 SET availability='false' WHERE id='{$table['id']}'; 
                        INSERT INTO $table3 (table_id, customer_name) 
                        VALUES ('{$table['id']}', '{$customerData['name']}')");
                        if(!$resultQuery){
                            die("Something went wrong   : ".mysqli_error($conn));
                        }else{
                            $_SESSION['token'] = bin2hex(random_bytes(32));
                            // echo("This is a point to mail the customer or notif the customer");
                            $id = bin2hex(mysqli_insert_id($conn));
                            header("Location: ./reservation.php?id={$id}");
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
            alert("Please Fill out reservation form first !").then(() => {window.location.href="../reserve.php"});
        </script>
        <?php
    }

/*
    TODO

    Part 1 : 
    process user form
        - check if user already reserved or not
        - check date and reservation time

    redirect/sent user email for confirmation/cancellation (using crsf token) if success
    sent back user to reserve page if fail but kept user input intact with input field

    Part 2 :
    assign reservation to table based on people
    alter table availability and input reservation information if success
    

    Part 3 :
    decide reservation option 
    - same day reservation
    - 2 weeks notice reservation
    if 2 weeks notice find way to save reservation without alter restaurant_tabel table
    both same day and 2 weeks require availability to be reset at 15:00 and 24:00
*/

?>  

