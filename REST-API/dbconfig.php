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
            $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE 1");
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
                $mhs_data = array(
                    'NIM' => $data['nim'],
                    'Nama' => $data['nama'],
                    'Angkatan' => $data['angkatan'],
                    'Semester' => $data['semester'],
                    'IPK' => $data['ipk']
                );

                array_push($respon['Data'], $mhs_data);
            }

        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($respon);
    }


    function insertMahasiswa(){
        $respon = array();
        global $conn;
        $data = json_decode(file_get_contents("php://input"), true);
        $nim = $data['nim'];
        $nama = $data['nama'];
        $angkatan = $data['angkatan'];
        $semester = $data['semester'];
        $ipk = $data['ipk']; 

        $result = mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, angkatan, semester, ipk) VALUES ('$nim', '$nama', '$angkatan', '$semester', '$ipk')");
        if($result){
            $respon['Kode'] = 200;
            $respon['Status'] = "Sukses, Memasukkan Data";
        }else{
            $respon['Kode'] = 400;
            $respon['Status'] = "Gagal, Memasukkan Data";
        }

        header("Accept: application/json");
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($respon);
    }

    function updateMahasiswa($id){
        global $conn;
        $respon = array();
        if(empty($id)){
            $respon['Kode'] = 404;
            $respon['Status'] = "Gagal, Data Tidak Ditemukan";
        }else{
            $data = json_decode(file_get_contents("php://input"), true);
            $nim = $data['nim'];
            $nama = $data['nama'];
            $angkatan = $data['angkatan'];
            $semester = $data['semester'];
            $ipk = $data['ipk']; 
            $result = mysqli_query($conn, "UPDATE mahasiswa SET nim='{$nim}', nama='{$nama}', angkatan='{$angkatan}', semester='{$semester}', ipk='{$ipk}' WHERE nim = '{$id}'");
            if($result){
                $respon['Kode'] = 200;
                $respon['Status'] = "Sukses, Data Telah Diupdate";
            }else{
                $respon['Kode'] = 400;
                $respon['Status'] = "Gagal, Data Gagal Diupdate";
                $respon['Text'] = mysqli_error($conn);
            }
        }
        header("Accept: application/json");
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($respon);
    }

    function deleteMahasiswa($id){
        global $conn;
        $respon = array();

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($respon);
    }
?>