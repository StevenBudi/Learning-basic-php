<?php
    include_once('./connection.php');
    include_once('./dbconfig.php');

    deleteData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $_GET['id']);
?>