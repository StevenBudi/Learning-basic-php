<?php
    include('../dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    require('../functions.php');
    
    switch ($request){
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            var_dump($data);
            updateReserDetails($conn, $table_info, $data['ID'], $data['State']);
            break;
        default:
            // Alert Then Redirect
            break;
    }


?>