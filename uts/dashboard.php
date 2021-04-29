<?php
    if(isset($_COOKIE['login'])){

    }else{
        echo ('<script>alert("Silahkan Login Terlebih Dahulu");
            window.location.href=(\'login.php\')
        </script>');
    }

?>