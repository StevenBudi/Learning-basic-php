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
    echo($dataCollection)


?>