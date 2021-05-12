<?php
    include('./dbconfig.php');
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

            const tableCheck = () =>{
                Swal.fire({
                    icon:"error",
                    title:"Sorry",
                    text:"It seems that there aren't any table available for you"
                });
                window.history.back();
            }
            
        </script>
    <?php
    if(isset($_POST['submit'])){
        $reserveData = new stdClass();
        $reserveData -> name    = $_POST['first_name']." {$_POST['last_name']}";
        $reserveData -> email   = $_POST['email'];
        $reserveData -> phone   = $_POST['phone'];
        $reserveData -> people  = $_POST['people'];
        $reserveData -> datetime = date_format(date_create($_POST['reser_date']." ".$_POST['reser_time'].":00:00"), "Y-m-d H:i:s");
        $reserveData -> notes   = $_POST['reser_notes'];
        $reserveData -> token = bin2hex($_POST['first_name']." {$_POST['last_name']}");
        
        $reserJson = json_encode($reserveData);
        $customer = json_decode($reserJson, true);
        $tabelCustomer = $table_customer;
        $tabelMeja = $table_info;
        # Check Data
        try {
            $query = "SELECT * FROM  $tabelCustomer WHERE customer_name = '{$customer['name']}'";
            $result = mysqli_query($conn, $query);
            $check = (mysqli_num_rows($result)) > 0 ? "reserved" : "not reserved";
            if($check === "reserved"){
                ?>
                <script>reserveCheck()</script>
                <?php
            }else{
                try {
                    $queryTable = "SELECT * FROM $table_info WHERE availability='true' AND capacity<={$customer['people']}";
                    $resultTable = mysqli_query($conn, $queryTable);
                    $checkTable = (mysqli_num_rows($resultTable) > 0) ? "Table Available" : "Table Not Available" ;
                    if($checkTable === "Table Available"){
                        var_dump($resultTable);
                        header("Location: ./insert.php");
                    }else{
                        ?>
                        <script>tableCheck()</script>
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
    

*/

?>  

