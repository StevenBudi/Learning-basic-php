<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Basic PHP</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" type="text/css">
</head>

<body>
    <header class="container-fluid" style="background-color: black;height:100px;display:flex;align-items:center;flex-direction:column;justify-content:center;margin-bottom:25px;">
        <h1 style="color:green;">Learning Basic PHP</h1>
    </header>
    <?php

    $t = 0;

    for ($i = 0; $i < 10; $i++) {
        if ($i % 3 == 0) {
            continue;
        }
        if ($i == 7) {
            break;
        }
        echo ("<strong style='font-size:calc(1.5rem + 2vmin);'>{$i} </strong>");
    }

    ?>
</body>

</html>