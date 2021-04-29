<?php
session_start();
include('./header.php');
headerDecor();
if (isset($_COOKIE['login'])) {
    $jml = $_SESSION['bil1'] + $_SESSION['bil2'];
    if ($_SESSION['nyawa']  == 0) {
        echo
        "Hello, {$_COOKIE['player']} Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.
            Score Anda : {$_SESSION['score']}";
?>
        <a href="dashboard.php">Main Lagi</a>
    <?php
        $_SESSION['bil1'] = rand(0, 20);
        $_SESSION['bil2'] = rand(0, 20);
        $_SESSION['nyawa'] = 3;
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
            <form method="post">
                <input type="text" name='jawaban'>
                <button type="submit" name='jawab'>Jawab</button>
            </form>

            <?php
            if (isset($_POST['jawab'])) {
                if (intval($_POST['jawaban']) == $jml) {
                    $_SESSION['score'] += 1;
                    echo ("<strong>
                        Hello {$_COOKIE['player']}, Selamat jawaban Anda benar…
                        <br/>Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['score']}
                        </strong>");
                } else {
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