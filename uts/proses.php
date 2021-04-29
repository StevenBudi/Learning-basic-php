<?php
    if(isset($_POST['submit'])){
        setcookie('login', true, 3600*24*365.25*1000);
        setcookie('player', $_POST['username'],  3600*24*365.25*1000);
    }else{
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>

