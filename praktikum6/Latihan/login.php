<?php
    include ("./header.php");
    headerDecor();
    $expire = time()+24*3600;
    if(isset($_POST['submit'])){
        setcookie("player", $_POST["username"], $expire);
        setcookie("high-score", 0, $expire);
        if(isset($_COOKIE['player'])){
            header("Location : game.php");
        }
    }
    else{
?>    
    <h1>Game Tebak Angka</h1>
    <hr>
    <p>Silahkan masukkan nama anda terlebih dahulu</p>
    <form action="login.php" method="POST">
        Nama Anda <input type="text" name="username">
        <input type="submit" value="Submit">
    </form>
<?php
    }
?>
