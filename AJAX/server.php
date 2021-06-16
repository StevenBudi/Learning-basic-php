<?php
    $res = array();
    include("koneksi.php");
    $request = $_SERVER['REQUEST_METHOD'];
    $index = 0;
    switch ($request) {
        case 'GET':
            $query = isset($_GET['city']) ? "SELECT * FROM regencies WHERE province_id = {$_GET['city']}" : 
            (isset($_GET['district']) ? "SELECT * FROM districts WHERE regency_id = {$_GET['district']}" : 
            "SELECT * FROM villages WHERE district_id = {$_GET['resident']}");
            $res = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($res)){
                ?>
                <option id="<?= $row['id'] ?>" value="<?= $row['name'] ?>">
                <?
            }
            break;
        default:
            # code...
            break;
    }