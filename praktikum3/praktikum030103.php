<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include './header.php';
    headerDecor();

    echo('
    <form action="" method="get">
        <input type="number" name="userInput" id="userInput" placeholder="Jumlah Formasi...">
        <button type="submit">Generate</button>
    </form>
    ');

    function buatBintangLagi($n){
        echo("<pre>");
        for ($i= $n; $i > 0; $i--) { 
            for ($j=$i; $j > 0 ; $j--) { 
                echo("*");
            }
            echo("\n");
        }
        echo("</pre>");
    }

    
    try{
        $userInput = $_GET['userInput'];
        buatBintangLagi($userInput);
    }catch (Exception $e){
        echo('');
    }



    buatBintangLagi(5);

?>