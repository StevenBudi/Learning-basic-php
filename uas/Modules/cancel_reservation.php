<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript"></script>
</head>
<body>
    
</body>
<?php
    error_reporting(E_ERROR | E_PARSE);
    include('./dbconfig.php');
    include('./functionality.php');
    $table1 = $table_customer;
    $table2 = $table_info;
    $table3 = $reservation_detail;

    $validation = intval(hex2bin($_GET['id']));
    $data_details = getOAuth($conn, $table1, $table3, $validation);
    if($data_details['customer_token'] === $_GET['tk'] && $data_details['customer_token'] && $data_details['status'] === "reserved"){
        // Delete reservation
        $data = fetchReserDetails($conn, $table3, $validation);
        try {
            updateTable($conn, $table2, $data['table_id']);
            updateReserDetails($conn, $table3, $validation, 'cancelled');
            ?>
            <script>
                Swal.fire({
                    icon:"info",
                    title:"Your Reservation has been canceled",
                    text:"Please visit us again"
                }).then(() => {
                    window.location.href="../../index.php";
                });
            </script>
            <?php
        } catch (\Throwable $th) {
            throw $th;
        }
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



?>