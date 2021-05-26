<?php
    // Get Reservation Details using Reservation ID
    function fetchReserDetails($connection, $table, $id){
            $reservation_result = mysqli_query($connection, "SELECT * FROM $table WHERE reservation_id='$id'");
            if(!$reservation_result){
                die("Something went wrong   : ".mysqli_error($connection));
            }else{
                return mysqli_fetch_assoc($reservation_result);
            }
    }

    // Get Customer Info Using Name
    function fetchCustomerInfo($connection, $table, $name){
            $customer_result = mysqli_query($connection, "SELECT * FROM $table WHERE customer_name = '$name'");
            if(!$customer_result){
                die("Something went wrong   : ".mysqli_error($connection));
            }else{
                return mysqli_fetch_assoc($customer_result);
            }
    }

    // Update Customer Information using Customer Name
    function updateCustomerInfo($connection, $table, $data, $name){
            $info_result = mysqli_query($connection, "UPDATE $table SET reservation_note = '{$_POST['notes']}', customer_phone= '{$_POST['phone']}' WHERE customer_name = '$name'");
            if(!$info_result){
                die("Something went wrong : ".mysqli_error($connection));
            }else{
                ?>
                    <script>
                        Swal.fire({
                            icon:"success",
                            title: "Success!",
                            text:"Your reservation has been confirmed !"
                        }).then(() => {
                            window.location.href="../../index.php";
                        });
                    </script>
                <?php
                $data = fetchCustomerInfo($connection, $table, $name);
                return $data;
            }
    }

    // Get Authentication ID using Reservation ID
    function getOAuth($connection, $table1, $table2, $id){
            $authResult = mysqli_query($connection, "SELECT customer_token, status FROM $table1, $table2 WHERE $table2.reservation_id = $id AND $table1.customer_name = $table2.customer_name");
            if(!$authResult){
                return false;
            }else{
                return mysqli_fetch_assoc($authResult);
            }
    }

    // Update Reservation Detail's Status
    function updateReserDetails($connection, $table, $id, $state){
        $updateResult = mysqli_query($connection, "UPDATE $table SET status='$state' WHERE reservation_id= '$id'");
        if(!$updateResult){
            die("Something went wrong   : ".mysqli_error($connection));
        }
        
    }

    // Delete Customer
    function deleteCustomer($connection, $table, $name){
        $deleteResult = mysqli_query($connection, "DELETE FROM $table WHERE customer_name='$name'");
        if(!$deleteResult){
            die("Something went wrong : ".mysqli_error($connection));
        }
    }

    // Flush Today Reservation and Customer Info
    function flushToday($connection, $table1, $table2){
        $flushResult = mysqli_query($connection, "DELETE FROM $table1, $table2 WHERE $table1.reservation_time = CURDATE() AND $table2.customer_name = $table1.customer_name");
        if(!$flushResult){
            die("Something went wrong :".mysqli_error($connection));
        }
    }

    // Update Table Status using Table ID
    function updateTable($connection, $table, $id){
        $tableResult = mysqli_query($connection, "UPDATE $table SET availability='true' WHERE id = '$id'");
        if(!$tableResult){
            die("Something went wrong   : ".mysqli_error($connection));
        }
    }

    function notAuthorize(){
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
