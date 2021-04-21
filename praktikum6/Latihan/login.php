<?php
    include ("./header.php");
    headerDecor();
    $expire = time()+24*3600;

    if(isset($_POST['submit'])){
        setcookie("username", $_POST["username"], $expire);
        // setcookie("high-score", 0, $expire);
        setcookie("random", rand(0, 100), $expire);

        
    }
    if(isset($_COOKIE['username'])){
        header("Location: game.php");
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
