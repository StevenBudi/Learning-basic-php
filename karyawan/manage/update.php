<?php
    include_once('./connection.php');
    include_once('./dbconfig.php');

    updateData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $_GET['id'])
?>