<?php
    include ("./header.php");
    require("./safe.php");
    headerDecor();
    $expire = time()+24*3600;

    $namafile = "db.txt";
    $myfile = fopen($namafile, "r") or die("Error Occured");
    $users = array();
    while(!feof($myfile)){
        $user = explode("|", fgets($myfile));
        array_push($users, $user);
        
    }
    fclose($myfile); 
       

    if(isset($_POST['submit'])){
        foreach ($users as $profile) {
            if(isset($profile[2])){
                var_dump($profile);
                if ($profile[0] == $_POST['username'] && $profile[2] == $_POST['password']){
                    setcookie("active", $profile[1], $expire);
                    $_COOKIE["active"] = $profile[1];
                    setcookie("random", encryption(strval(rand(0, 100))), $expire); 
                }
                if (isset($_COOKIE["active"])){
                    echo("<script>window.location.href=('game.php')</script>");
                }
            }
        }
        echo("<script>alert('Login Gagal, check kembali password dan nama anda')</script>");
        
        
    }
    if (isset($_COOKIE["active"])){
        echo("<script>window.location.href=('game.php')</script>");
    }
    
    else{
?>    

    <div class="container container-fluid">
        <h1>Game Tebak Angka</h1>
        <hr>
        <p>Silahkan masukkan nama dan password anda terlebih dahulu</p>
        <form action="login.php" method="POST">
            <table>
                <tr class="mb-3 pb-5">
                    <td>Nama</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr class="mb-3 pb-5">
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </form>
        <p>Belum Punya Akun ? Silahkan Register di <a href='register.php'>sini</a></p>
    </div>
<?php
    }
?>
