<?php
    include_once('./dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    $uri_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segment = explode("/", $uri_url);
    var_dump($uri_segment);

    switch($request){
        case 'GET':
            if(empty($uri_segment[4])){
                getMahasiswa();
            }else{
                $nim = $uri_segment[4];
                getMahasiswa($nim);
            }
            break;
        default:
            break;
    }


?>