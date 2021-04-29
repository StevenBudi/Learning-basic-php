<?php
    include('./header.php');
    include('./dbconfig.php');
    include('./connection.php');
    headerDecor();
?>
    <div class="container container-fluid">
<?php
        fetchData($dbhost, $dbuser, $dbpass, $dbname, $port);
?>        
    </div>