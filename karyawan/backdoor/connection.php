<?php
    function fetchData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
            die("Connection Error".mysqli_connect_error());
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
            <h1 style="display: flex;text-align:center;justify-content:center;" class="mb-3">Data Pegawai</h1>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id Pegawai</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Change</th>  
                </tr>
        <?php
            while($row = mysqli_fetch_assoc($search)){
                echo("<tr>
                        <td>{$row['id_karyawan']}</td>
                        <td><a href='pegawai.php?id={$row['id_karyawan']}'>{$row['nama']}</a></td>
                        <td>{$row['email']}</td>
                        <td>{$row['jenis_kelamin']}</td>
                        <td>
                            <a href='./backdoor/update.php' class='btn btn-success'>Update</a>
                            <a href='./backdoor/delete.php' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>");
            }
        ?>  

            </table>
        <?php        
        }else{
                echo("Data Not Found");
        }
        mysqli_close($conn);
    }

    function getData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $data){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
            die("Connection Error".mysqli_connect_error());
        ?>
        <script>console.log('Connection Error');</script>
        <?php
        }else{
        ?>
        <script>console.log('Connection Success')</script>
        <?php
        }
        mysqli_close($conn);
    }

    function postData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $data){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
            die("Connection Error".mysqli_connect_error());
        ?>  
        <script>console.log('Connection Error');</script>
        <?php
        }else{
        ?>
        <script>console.log('Connection Success')</script>
        <?php
        }
        $query = "INSERT INTO $dbtable (nama, email, telepon, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir) 
        VALUES ('{$data['nama']}','{$data['email']}', '{$data['telp']}', '{$data['alamat']}', '{$data['gender']}', '{$data['tempat']}', '{$data['tanggal']}')";
        if(mysqli_query($conn, $query)){
        ?>
            <script>console.log("Insert Data Success")</script>
        <?php
        
        }else{
        ?>
            <script>console.log("Insert Data Failed")</script>
        <?php
            die("Insert Failed ".mysqli_error($conn));
        }
        mysqli_close($conn);
    }

    function deleteData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $data){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
            die("Connection Error".mysqli_connect_error());
        ?>
        <script>console.log('Connection Error');</script>
        <?php
        }else{
        ?>
        <script>console.log('Connection Success')</script>
        <?php
        }
        mysqli_close($conn);
    }

    function updateData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $data){
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

        if (!$conn){
            die("Connection Error".mysqli_connect_error());
        ?>
        <script>console.log('Connection Error');</script>
        <?php
        }else{
        ?>
        <script>console.log('Connection Success')</script>
        <?php
        }
        mysqli_close($conn);
    }

?>