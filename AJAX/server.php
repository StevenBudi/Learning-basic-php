<?php
    $res = array();
    include("koneksi.php");
    $request = $_SERVER['REQUEST_METHOD'];
    $index = 0;
    switch ($request) {
        case 'CITY':
            $query = "SELECT * FROM regencies WHERE province_id = {$_GET['city']}";
            $res = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($res)){
                $res[$index][$id] = $row["id"];
                $res[$index][$name] = $row["name"];
                $index++;
            }
            return json_decode($res, true);
            break;
        case 'DISTRICT':
            $query = "SELECT * FROM districts WHERE regency_id = {$_GET['district']}";
            $res = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($res)){
                $res[$index][$id] = $row["id"];
                $res[$index][$name] = $row["name"];
                $index++;
            }
            return json_decode($res, true);
            break;

        case 'RESIDENT':
            $query = "SELECT * FROM villages WHERE district_id = {$_GET['resident']}";
            $res = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($res)){
                $res[$index][$id] = $row["id"];
                $res[$index][$name] = $row["name"];
                $index++;
            }
            return json_decode($res, true);
            break;
        default:
            # code...
            break;
    }