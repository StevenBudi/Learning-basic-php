<?php
    function insertScore($dbhost, $dbuser, $dbpass, $dbname, $port, $NAMA, $SCORE){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
        if ($conn) {
            echo "<script>console.log('Koneksi Berhasil');</script>";
        } else {
            $err_msg = mysqli_connect_error();
            die("<script>console.log('Koneksi Gagal : '.$err_msg);</script>");
        }
        $query = "INSERT INTO highscore (Player, Score)
            VALUES ('$NAMA', '$SCORE')";
        if (mysqli_query($conn, $query)){
            echo"<script>console.log('Input Data Berhasil');</script>";
        }else{
            $err = mysqli_error($conn);
            die("<script>console.log('Input Data Gagal : '.{$err});</script>");
        }
    
        mysqli_close($conn);
    }

    function fetchData($dbhost, $dbuser, $dbpass, $dbname, $port){
        $index = 1;
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
        if ($conn) {
            echo "<script>console.log('Koneksi Berhasil');</script>";
        } else {
            $err_msg = mysqli_connect_error();
            die("<script>console.log('Koneksi Gagal : '.$err_msg);</script>");
        }

        $query = "SELECT * FROM highscore ORDER BY Score DESC LIMIT 10";
        $search = mysqli_query($conn, $query);
        if (mysqli_num_rows($search) > 0) {
?>
        <div class="container container-fluid">
        <h1 style="display: flex;align-items: center;justify-content: center;text-align: center;">Hall Of Fame</h1>
            <table class="table table-dark">
            <tr>
                <th>No</th>
                <th>Player</th>
                <th>Score</th>
            </tr>
<?php
            while ($row = mysqli_fetch_assoc($search)) {
                echo("<tr>");
                echo("<td>$index</td>");
                echo("<td>{$row['Player']}</td>");
                echo("<td>{$row['Score']}</td>");
                echo("</tr>");
                $index++;
            }
?>          
            </table>
        </div>
<?php
        }else{
            echo("Data tidak ditemukan");
        }
        mysqli_close($conn);     
    }
?>