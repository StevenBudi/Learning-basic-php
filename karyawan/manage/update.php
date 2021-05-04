<?php
    include_once('./connection.php');
    include_once('./dbconfig.php');
    $update = $_GET['id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Pegawai <?php echo $update?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <div class="container container-fluid">
            <form method="post">
                <table>
                    
                </table>
            </form>
        </div>

    <?php
    $update_data = [];
    updateData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $update_data);
    ?>
    </body>
    </html>
?>