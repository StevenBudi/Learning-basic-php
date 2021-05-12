<?php
    session_start();
    include('./dbconfig.php');
    if(isset($_POST['submit']) && ($_SESSION['token'] === $_POST['token'])){
        unset($_SESSION['token']);
        $reserveData = new stdClass();
        $reserveData -> name    = $_POST['first_name']." {$_POST['last_name']}";
        $reserveData -> email   = $_POST['email'];
        $reserveData -> phone   = $_POST['phone'];
        $reserveData -> people  = $_POST['people'];
        $reserveData -> datetime = date_format(date_create($_POST['reser_date']." ".$_POST['reser_time'].":00:00"), "Y-m-d H:i:s");
        $reserveData -> notes   = $_POST['reser_notes'];
        
        $reserJson = json_encode($reserveData);
        $customerData = json_decode($reserJson, true);
        $tabelCustomer = $table_customer;
        $tabelMeja = $table_info;
        # Check Data
        try {
            $resultCustomer = mysqli_query($conn, "SELECT * FROM  $tabelCustomer WHERE customer_name = '{$customerData['name']}'");
            $check = ($resultCustomer === false) ? "reserved" : "not reserved";
            if($check === "reserved"){
                ?>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10">
                        // Need Fixing ?
                        const reserveCheck = () => {
                            Swal.fire({
                                icon:"error",
                                title:"Oops...",
                                text:"It Looks like you already reserved with us"
                            });
                            window.history.back();
                        }
                        
                        reserveCheck();
                        alert("You Already Reserved with us");
                    </script>
                <?php
            }else{
                try {
                    $resultTable = mysqli_query($conn, "SELECT * FROM $table_info WHERE availability='true' AND capacity = {$customerData['people']}");
                    if($resultTable === false){
                        $limit = $customerData['people']*2;
                        $resultTable = mysqli_query($conn, "SELECT * FROM $table_info WHERE availability='true' AND capacity <= '$limit'");
                    }
                    $checkTable = ($resultTable != false)  ? "Table Available" : "Table Not Available" ;
                    if($checkTable === "Table Available"){
                        $table = mysqli_fetch_assoc($resultTable);
                        var_dump($customerData);
                        echo("<br/>");
                        var_dump($table);
                        $resultQuery = mysqli_multi_query($conn, "INSERT INTO $tabelCustomer () VALUES (); UPDATE $tabelMeja SET ... WHERE ...");
                        if(!$resultQuery){
                            die("Something went wrong   : ".mysqli_error($conn));
                        }else{
                            mail("","Reservation Information", "Please go to this link to view your reservation details");
                        }
                        // header("Location: ./insert.php");
                    }else{
                        ?>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10">
                                const tableCheck = () =>{
                                    Swal.fire({
                                        icon:"error",
                                        title:"Sorry",
                                        text:"It seems that there aren't any table available for you"
                                    });
                                    window.history.back();
                                }
                                tableCheck();
                                alert("There aren't any table available for you");  
                            </script>
                        <?php
                    }
                } catch (\Throwable $th) {
                    throw $th;
                    die("Something went wrong : ".mysqli_error($conn));
                }
                
            }
        } catch (\Throwable $th) {
            throw $th;
            die("Something went wrong   : ".mysqli_error($conn));
        }

    }else{
        ?>
        <script>
            alert("Please Fill out reservation form first !");
            window.location.href ="../reserve.php";
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

