<?php

    setcookie('login', "", time()-3600*24);
    setcookie('player', "",  time()-3600*24);
    header("Location:login.php");