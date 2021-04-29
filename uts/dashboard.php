<?php
session_start();
include('./header.php');
include('./dbconfig.php');
include('./connection.php');
headerDecor();
if (isset($_COOKIE['login'])) {
    $jml = $_SESSION['bil1'] + $_SESSION['bil2'];
    if ($_SESSION['nyawa'] < 1) {
        echo
        "<div class='container container-fluid'>
            <h1>
                Hello, {$_COOKIE['player']} Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.
                Score Anda : {$_SESSION['score']}
            </h1>
            <a href='dashboard.php' class='btn btn-warning'>Main Lagi</a>
            <a href='ranking.php' target='_blank' rel='noopener noreferrer' class='btn btn-secondary'>Hall of Fame</a>
            </div>";
        insertScore($dbhost, $dbuser, $dbpass, $dbname, $port, $_COOKIE['player'], $_SESSION['score']);
        $_SESSION['bil1'] = rand(0, 20);
        $_SESSION['bil2'] = rand(0, 20);
        $_SESSION['nyawa'] = 5;
        $_SESSION['score'] = 0;
    } else {
    ?>
        <div class="container container-fluid">
            <?php
            echo ("<h4>
                    Hello {$_COOKIE['player']}, tetap semangat ya… you can do the best!!
                    <br/>
                    Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['score']}
                    </h4>
                    <hr/>
                    ");

            echo ("<span>Berapakah ");
            echo ("{$_SESSION['bil1']} + {$_SESSION['bil2']} = ");
            echo ("</span>");
            ?>
            <form method="post" class="">
                <input type="number" name='jawaban' class="form-control">
                <br>
                <button type="submit" name='jawab' class="btn btn-primary">Jawab</button>
            </form>

            <?php
            if (isset($_POST['jawab'])) {
                if (intval($_POST['jawaban']) == $jml) {
                    $_SESSION['score'] += 10;
                    echo ("<strong>
                        Hello {$_COOKIE['player']}, Selamat jawaban Anda benar…
                        <br/>Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['score']}
                        </strong>");
                } else {
                    $_SESSION['score'] -= 2;
                    $_SESSION['nyawa'] -= 1;
                    echo ("<strong>
                        Hello {$_COOKIE['player']}, sayang jawaban Anda salah… tetap semangat ya !!!
                        <br/>Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['score']}
                        </strong>");
                }
                $_SESSION['bil1'] = rand(0, 20);
                $_SESSION['bil2'] = rand(0, 20);
            ?>
                <a href="dashboard.php">Soal Selanjutnya</a>
        </div>
<?php
            }
        }
    } else {
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>