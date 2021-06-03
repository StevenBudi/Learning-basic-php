<?php

use function PHPSTORM_META\type;

$dbdetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db' => 'pertemuan13'
    );

    $table = 'tma';

    $primary_key = 'id_tma';

    $columns = array(
        array('db' => 'id_tma', 'dt' => 0),
        array('db' => 'id_pos', 'dt' => 1),
        array('db' => 'nilai', 'dt' => 2),
        array('db' => 'waktu', 'dt' => 3)
    );

    require('./ssp.class.php');

    $dataCollection =  json_encode(SSP::simple( $_GET, $dbdetails, $table, $primary_key, $columns ));
    // file_put_contents("data.json", $dataCollection);
    $dataSet = json_decode($dataCollection, true)["data"];
    foreach ($dataSet as $data) {
        ?>
        <tr>
            <td><?= $data[0]?></td>
            <td><?= $data[1]?></td>
            <td><?= $data[2]?></td>
            <td><?= $data[3]?></td>
            <td style="display:flex; align-items:center; justify-content: center;">
                <button class="btn btn-info mx-2">Edit</button>
                <button class="btn btn-danger mx-2">Delete</button>
            </td>
        </tr>
        <?php
    }
    // Display tbody then tr and td


?>