<?php
    include('../Modules/dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    require('../Modules/functions.php');
    switch ($request){
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            var_dump($data);
            updateReserDetails($conn, $reservation_detail, $data['ID'], $data['State']);
            break;
        default:
            // Alert Then Redirect
            break;
    }


?>