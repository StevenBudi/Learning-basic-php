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
        $query = "SELECT * FROM $dbtable ORDER BY `id_karyawan` ASC";
        $search = mysqli_query($conn, $query);
        if (mysqli_num_rows($search) > 0){
        ?>
            <h1 style="display: flex;text-align:center;justify-content:center;" class="mb-3">Data Pegawai</h1>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Change</th>  
                </tr>
        <?php
            $index = 1;
            while($row = mysqli_fetch_assoc($search)){
                echo("<tr>
                        <td>{$index}</td>
                        <td><a href='./manage/pegawai.php?id={$row['id_karyawan']}'>{$row['nama']}</a></td>
                        <td>{$row['email']}</td>
                        <td>{$row['jenis_kelamin']}</td>
                        <td>
                            <a href='./manage/update.php?id={$row['id_karyawan']}' class='btn btn-success'>Update</a>
                            <a href='./manage/delete.php?id={$row['id_karyawan']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>");
                $index++;
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
        $query = "SELECT * FROM $dbtable WHERE id_karyawan = $data";
        $search = mysqli_query($conn, $query);
        if(mysqli_num_rows($search) > 0){
            $karyawan = mysqli_fetch_assoc($search);
            var_dump($karyawan);
        ?>
            <div class="container container-fluid" style="display: flex;justify-content: center;align-items: center;">
                <div class="card text-white bg-dark mb-3 mt-5" style="width:75%; height: 50%;">
                    <div class="card-body">
                        <h1 class="card-title">Data Karyawan - <?php echo $karyawan['id_karyawan'];?></h1>
                        <div class="card-text">
                            <table style="color: white;" class="table table-borderless">
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $karyawan['nama'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $karyawan['email'];  ?></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td><?php echo $karyawan['telepon'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $karyawan['alamat'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?php echo $karyawan['jenis_kelamin'];  ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td><?php echo $karyawan['tempat_lahir'].", ".$karyawan['tanggal_lahir'];  ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }else{
            echo("Data Not Found");
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
            die("Insert Failed ".mysqli_error($conn).mysqli_errno($conn));
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