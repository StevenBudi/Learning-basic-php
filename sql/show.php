<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <?php
        include './dbconfig.php';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if($conn){
            echo"<script>console.log('Koneksi Sukses');</script>";
        }
        else{
            die("Koneksi Gagal : ".mysqli_connect_errno());
        }

        $query = "SELECT * FROM mhs ORDER BY nim";

        $search = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($search) > 0) {
            while ($row = mysqli_fetch_assoc($search)) {
                echo ("
                <pre>
                    <p>
                        NIM             : {$row['nim']}
                        Nama            : {$row['nama']}
                        Alamat          : {$row['alamat']}
                        Tanggal Lahir   : {$row['lahir']}
                        Usia            : {$row['usia']}
                    </p>
                    
                </pre>
                
                ");
            }
        }else{
            echo("Data tidak ditemukan");
        }

        mysqli_close($conn);
    ?>
    
</body>
</html>