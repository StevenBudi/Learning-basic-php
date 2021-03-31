<?php
    include './header.php';
    // Ignore Error Notice
    error_reporting(E_ALL ^ E_NOTICE);
    headerDecor();
    function buatBintang($n){
        echo"<pre>";
        for ($i=0; $i <= $n; $i++) { 
            for ($j=0; $j < $i; $j++) { 
                echo("*");
            }
            echo("\n");
        }

        echo"</pre>";
    }

    echo(
        '<form action="" method="get">
            <input type="text" name="userInput" id="userInput" placeholder="Jumlah Formasi..." value="">
            <button type="submit" action="">Generate</button>
        </form>'
        
    );
    
    $userInput = ($_GET['userInput']    );
    buatBintang($userInput);
    echo("<br>");
    buatBintang(4);
    // echo("<br>");
    // buatBintang(5);


?>