<?php
    include("koneksi.php");
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request) {
        case 'CITY':
            # code...
            break;
        case 'DISTRICT':
            break;

        case 'RESIDENT':
            break;
        default:
            # code...
            break;
    }