<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        error_reporting(E_ALL^E_NOTICE^E_WARNING);
        include './header.php';
        headerDecor();
        echo('
        <h1>Kalkulator Sederhana</h1>

        <form method="post" action="kalkulator2.php">
            Bilangan 1 <input type="text" name="bil1"> <br>
            Bilangan 2 <input type="text" name="bil2"> <br><br>
            <input type="submit" name="penjumlahan" value="+">
            <input type="submit" name="pengurangan" value="-">
            <input type="submit" name="perkalian" value="x">
            <input type="submit" name="pembagian" value="/">
            <input type="submit" name="pangkat" value="^">
        </form>
        
        ');

        // baca kedua bilangan
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        // proses perhitungan
        if (isset($_POST["penjumlahan"])){
            $hasil = $bil1 + $bil2;
            $op = "+";
        } else if (isset($_POST["pengurangan"])){
            $hasil = $bil1 - $bil2;
            $op = "-";
        } else if (isset($_POST["perkalian"])){
            $hasil = $bil1 * $bil2;
            $op = "*";
        } else if (isset($_POST["pembagian"])){
            $hasil = $bil1 / $bil2;
            $op = "/";
        } else if (isset($_POST["pangkat"])){
            $hasil = pow($bil1, $bil2);
            $op = "^";
        }

        // menampilkan hasil perhitungan
        echo "<h2>".$bil1." ".$op." ".$bil2." = ".$hasil."</h2>";
    ?>


</body>

</html>