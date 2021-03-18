<?php
    echo nl2br ("Hello World\nHello World\nHello World\n");


    echo"<br/>";
    // Statement Control
    $t = date("H");

    if ($t > "20"){
        echo nl2br("It's Night {$t}\n");
    }
    else {
        echo nl2br("It's Not Night Yet {$t}\n");
    }
    
    $t  = 5;
    
    //Loop
    while ($t>=0){
        echo("Number : {$t} <br>");
        $t--;
    }
    