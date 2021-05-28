<?php
    include('../Modules/dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    require('../Modules/functions.php');
    switch ($request){
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            $reser_details = fetchReserDetails($conn, $table_info, $data['ID']);
            if($data['State'] === 'check-out'){
                deleteCustomer($conn, $customer_info, $reser_details['customer_name']);
                updateTable($conn, $table_info, $reser_details['table_id']);                    
            }else{
                updateReserDetails($conn, $reservation_detail, $data['ID'], $data['State']);
            }
            break;
        case 'DELETE':
            flushToday($conn, $customer_info);
            // Delete All Reservation Detail and Customer Today
            break;
        default:
            // Alert Then Redirect
            break;
    }


?>