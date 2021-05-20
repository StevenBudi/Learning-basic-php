<?php
    include_once('./dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    $uri_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segment = explode("/", $uri_url);
    // var_dump($uri_segment);
    switch($request){
        case 'GET':
            if(empty($_GET['nim'])){
                getMahasiswa();
            }else{
                $nim = $_GET['nim'];
                getMahasiswa($nim);
            }
            break;
        case 'POST':
            insertMahasiswa();
            break;
        case 'PUT':
            updateMahasiswa($_GET['nim']);
            break;
        case 'DELETE':
            deleteMahasiswa($_GET['nim']);
            break;
        default:
            break;
    }


?>