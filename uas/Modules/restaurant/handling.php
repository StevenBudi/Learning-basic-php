<?php
    include('../dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    require('../functions.php');
    
    switch ($request){
        case 'PUT':
            updateReserDetails($conn, $table_info, $_GET['id'], $_GET['state']);
            break;
        default:
            // Alert Then Redirect
            break;
    }


?>