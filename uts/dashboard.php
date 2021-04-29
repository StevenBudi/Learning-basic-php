<?php
    session_start();
    include('./header.php');
    headerDecor();
    if(isset($_COOKIE['login'])){
        $jml = $_SESSION['bil1'] + $_SESSION['bil2'];
        $player = $_COOKIE['username'];
        "Hello $player, tetap semangat ya… you can do the best!!
        Lives: <lives> | Score: <score>";
?>      
        <div class="container container-fluid">
<?php   
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
                "Hello <nama>, Selamat jawaban Anda benar…
                Lives: <lives> | Score: <score>";
            }else{
                "Hello <nama>, sayang jawaban Anda salah… tetap semangat ya !!!
                Lives: <lives> | Score: <score>";
            }
            $_SESSION['bil1'] = rand(0, 20);
            $_SESSION['bil2'] = rand(0, 20);
?>
            <a href="dashboard.php">Soal Selanjutnya</a>
<?php
        }
    }else{
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>