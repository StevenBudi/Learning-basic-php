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
    require('./functions.php');
    global $customer_info, $table_info, $reservation_detail;

    $validation = intval(hex2bin($_GET['id']));
    $data_details = getOAuth($conn, $customer_info, $reservation_detail, $validation);
    if($data_details['customer_token'] === $_GET['tk'] && $data_details['customer_token'] && $data_details['status'] === "reserved"){
        // Delete reservation
        $data = fetchReserDetails($conn, $reservation_detail, $validation);
        updateTable($conn, $table_info, $data['table_id']);
        deleteCustomer($conn, $customer_info, $data['customer_name']);
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
    }else{
        notAuthorize();
    }



?>