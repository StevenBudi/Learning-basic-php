<?php
    include ("./header.php");
    require("./safe.php");
    headerDecor();
    $expire = time()+24*3600;
    if(isset($_POST['submit'])){
        setcookie("username", $_POST["username"], $expire);
        $_COOKIE["username"] = $_POST["username"];
        setcookie("random", encryption(strval(rand(0, 100))), $expire); 
          
    }
    if(isset($_COOKIE["username"])){
        echo("<script>window.location.href=('game.php')</script>");
    }
    
    else{
?>    
    <h1>Game Tebak Angka</h1>
    <hr>
    <p>Silahkan masukkan nama anda terlebih dahulu</p>
    <form action="login.php" method="POST">
        Nama Anda <input type="text" name="username">
        <input type="submit" value="Submit" name="submit">
    </form>
<?php
    }
?>
