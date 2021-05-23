<?php
    include('../dbconfig.php');
    $request = $_SERVER['REQUEST_METHOD'];
    ?>
    <script>console.log('<?= $request?>')</script>
    <?php
    switch ($request){
        case 'POST':
            break;
        default:
            // Alert Then Redirect
            break;
    }


?>