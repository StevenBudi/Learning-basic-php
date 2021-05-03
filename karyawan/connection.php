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
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </table>
<?php
            while($row = mysqli_fetch_assoc($search)){
                ;
            }
        }
    }

?>