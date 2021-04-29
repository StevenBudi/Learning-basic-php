<?php
    session_start();
    if(isset($_POST['submit'])){
        setcookie('login', true, time() + 3600*24*365.25*1000);
        setcookie('player', $_POST['username'], time() + 3600*24*365.25*1000);
        $_SESSION['bil1'] = rand(0, 20);
        $_SESSION['bil2'] = rand(0, 20);
        $_SESSION['nyawa'] = 0;
        $_SESSION['score'] = 0;
        header('Location:dashboard.php');
    }else{
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>

