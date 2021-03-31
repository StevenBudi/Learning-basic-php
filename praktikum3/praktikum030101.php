<?php

    include './header.php';
    headerDecor();
    function gandakanString($s, $n){
        return(str_repeat($s, $n));
    }
    $result = gandakanString("Hello", 3);
    echo("<h1>${result}</h1>");
?>