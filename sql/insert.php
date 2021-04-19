<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <?php
    include './dbconfig.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
    // Check Connection
    if ($conn) {
        echo "<script>console.log('Koneksi Berhasil');</script>";
    } else {
        $err_msg = mysqli_connect_error();
        die("<script>console.log('Koneksi Gagal : '.$err_msg);</script>");
    }

    
    // The date of right now
    $now = preg_split("[\D]", date("Y-m-d"), 3);
    [$year2, $month2, $day2] = $now;
    $jd2 = gregoriantojd($month2, $day2, $year2);

    //Calculate age
    function AgeCalculation(String $date1)
    {
        $date1 = preg_split("[\D]", $date1, 3);
        [$year1, $month1, $day1] = $date1;
        $jd1 = gregoriantojd($month1, $day1, $year1);
        return (intval(($GLOBALS["jd2"] - $jd1) / 365.25));
    }

    $NIM = $_POST['nim'];
    $NAMA = $_POST['nama'];
    $LAHIR = $_POST['lahir'];
    $ALAMAT = $_POST['alamat'];
    
    $AGE = AgeCalculation($LAHIR);
    echo ($NIM . $NAMA . $LAHIR . $ALAMAT.$AGE);

    $query = "INSERT INTO mhs (nim, nama, alamat, lahir, usia)
            VALUES ('$NIM', '$NAMA', '$ALAMAT', '$LAHIR', '$AGE')";

    if (mysqli_query($conn, $query)){
        echo"<script>console.log('Input Data Berhasil');</script>";
    }else{
        die("<script>console.log('Input Data Gagal : ' + mysqli_error())</script>");
    }


    mysqli_close($conn);
    ?>

</body>

</html>