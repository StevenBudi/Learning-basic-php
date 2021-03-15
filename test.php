<?php

    $t = 0;

    for ($i = 0; $i < 10; $i++){
        if ($i % 3 == 0){
            continue;
        }
        if ($i == 7){
            break;
        }
        echo ("<strong style='font-size:calc(1.5rem + 2vmin);'>{$i} </strong>");
        
    }