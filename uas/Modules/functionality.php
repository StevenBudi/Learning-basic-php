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
            $info_result = mysqli_query($connection, "UPDATE $table SET reservation_note = '{$_POST['notes']}', customer_phone= '{$_POST['phone']}' WHERE customer_name = '{$data1['customer_name']}'");
            if(!$info_result){
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
                $data = fetchCustomerInfo($connection, $table, $data2);
                return $data;
            }
    }

    function getOAuth($connection, $table1, $table2, $id){
            $authResult = mysqli_query($connection, "SELECT customer_token, status FROM $table1, $table2 WHERE $table2.reservation_id = $id AND $table1.customer_name = $table2.customer_name");
            if(!$authResult){
                return false;
            }else{
                return mysqli_fetch_assoc($authResult);
            }
    }

    function updateReserDetails($connection, $table, $id, $state){
        // Using id get customer name and table id
        // Delete reservation details using id and customer using name
        // Alter table information using table id
        $updateResult = mysqli_query($connection, "UPDATE $table SET status='$state' WHERE reservation_id= '$id'");
        if(!$updateResult){
            die("Something went wrong   : ".mysqli_error($connection));
        }
        
    }

    function deleteCustomer($connection, $table, $name){
        $deleteResult = mysqli_query($connection, "DELETE FROM $table WHERE customer_name='$name'");
        if(!$deleteResult){
            die("Something went wrong : ".mysqli_error($connection));
        }
    }

    function updateTable($connection, $table, $id){
        $tableResult = mysqli_query($connection, "UPDATE $table SET availability='true' WHERE id = '$id'");
        if(!$tableResult){
            die("Something went wrong   : ".mysqli_error($connection));
        }
    }
