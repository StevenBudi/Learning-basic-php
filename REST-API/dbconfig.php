<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'universitas';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        die("Connection Error   : ".mysqli_connect_error($conn));
    }


    function getMahasiswa($id="0"){
        global $conn;
        $respon = array();
        $respon['Kode'] = 200;
        $respon['Status'] = 'Sukses';
        $respon['Data'] = array();
        if($id === "0"){
            $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE 0");
            while($data = mysqli_fetch_array($result)){
                $mhs_data = array(
                    'NIM' => $data['nim'],
                    'Nama' => $data['nama'],
                    'Angkatan' => $data['angkatan'],
                    'Semester' => $data['semester'],
                    'IPK' => $data['ipk']
                );

                array_push($respon['Data'], $mhs_data);
            }
        }else{
            $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $id");
            if(!$result){
                $respon['Kode'] = 404;
                $respon['Status'] = 'Gagal, Data Tidak Ditemukan';
            }else{
                $data = mysqli_fetch_assoc($result);
                $respon['Data'] = array(
                    'NIM' => $data['nim'],
                    'Nama' => $data['nama'],
                    'Angkatan' => $data['angkatan'],
                    'Semester' => $data['semester'],
                    'IPK' => $data['ipk']
                );
            }

        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        return json_encode($respon);
    }
?>