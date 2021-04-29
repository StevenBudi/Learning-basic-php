<?php
    session_start();
    include('./header.php');
    headerDecor();
    if(isset($_COOKIE['login'])){
        $jml = $_SESSION['bil1'] + $_SESSION['bil2'];
        $player = $_COOKIE['username'];
        $score = $_SESSION['score'];
        $nyawa = $_SESSION['nyawa'];
        if ($_SESSION['nyawa']  == 0){
            echo
            "Hello, $player… Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.
            Score Anda : $score";
?>
            <a href="dashboard.php">Main Lagi</a>
<?php
            $_SESSION['bil1'] = rand(0, 20);
            $_SESSION['bil2'] = rand(0, 20);
            $_SESSION['nyawa'] = 3;
            $_SESSION['score'] = 0;
        } else{
?>    
            <div class="container container-fluid">
<?php   
                echo('<h1>"Hello $player, tetap semangat ya… you can do the best!!
                Lives: $nyawa | Score: $score"</h1>');
                echo("<span>Berapakah ");
                echo($_SESSION['bil1']. "+".$_SESSION['bil2']." = ");
                echo("</span>");
?>
                <form method="post">
                    <input type="text" name='jawaban'>
                    <button type="submit" name='jawab'>Jawab</button>
                </form>
            </div>
<?php
            if(isset($_POST['jawab'])){
                if(intval($_POST['jawaban']) == $jml){
                    $_SESSION['score'] += 1;
                    echo("Hello $player, Selamat jawaban Anda benar…
                    Lives: $nyawa | Score: $score");
                }else{
                    $_SESSION['nyawa'] -= 1;
                    echo("Hello $player, sayang jawaban Anda salah… tetap semangat ya !!!
                    Lives: $nyawa | Score: $score");
                }
                $_SESSION['bil1'] = rand(0, 20);
                $_SESSION['bil2'] = rand(0, 20);
?>
                <a href="dashboard.php">Soal Selanjutnya</a>
<?php
            }  
        }

    }else{
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>