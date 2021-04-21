<?php
    include("./header.php");
    headerDecor();
    date_default_timezone_set("Asia/Jakarta");
    $bil = rand(0, 101);
    $score = 0;


    

    while(true){
        echo('
        <form  method="get">
            Tebakan Anda <input type="text" name="tebak"> <input type="submit" value="Submit">
        </form>    
        ');
        $guess = $_GET['tebak'];
        $score+=1;
        if ($guess > $bil) {
            echo("<pre>
            Hallo, nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan Anda menebak ya!
            
            Waaah… masih salah ya, bilangan tebakan Anda terlalu tinggi.
             </pre>");
        }else if($guess < $bil){
           echo("
           <pre>
           Hallo, nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan Anda menebak ya!
           
           Waaah… masih salah ya, bilangan tebakan Anda terlalu rendah.
            </pre>");

        }else{
            break;
            
        }
    }
    if($_COOKIE['high-score'] > $score && $_COOKIE['high-score'] != 0){
        setcookie('high-score', $score, time()+24*3600);
    }

    echo"<pre>
    Selamat ya… Anda benar, saya telah memilih bilangan $bil.
    </pre>";

    echo'
    <a href="game.php">Restart</a>
    ';
    
    
?>