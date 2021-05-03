<?php
    function fetchData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
?>
        <script>console.log('Connection Error');</script>
<?php
        }else{
?>
        <script>console.log('Connection Success')</script>
<?php
        }
        $query = "SELECT * FROM $dbtable ORDER BY `id_karyawan` DESC";
        $search = mysqli_query($conn, $query);
        if (mysqli_num_rows($search) > 0){
?>
            <div>
                <table>
                    <tr>
                        <th>Id Pegawai</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>  
                    </tr>
<?php
            while($row = mysqli_fetch_assoc($search)){
                echo("<tr>
                        <td>{$row['id_karyawan']}</td>
                        <td><a href='pegawai.php?id={$row['id_karyawan']}'>{$row['nama']}</a></td>
                        <td>{$row['email']}</td>
                        <td>{$row['jenis_kelamin']}</td>
                    </tr>");
            }
?>
            
                </table>
            </div>
<?php        
        }
    }

?>