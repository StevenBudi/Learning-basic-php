<?php
    include_once('./connection.php');
    include_once('./dbconfig.php');
    $update = $_GET['id'];
    $karyawan = getData($dbhost, $dbuser, $dbpass, $dbname , $port, $dbtable, $update);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Pegawai <?php echo $update?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <div class="container container-fluid">
            <form method="post">
                <table class="table table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda" value="<?php echo ($karyawan['nama']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" class="form-control" placeholder="Email Anda" value="<?php echo $karyawan['email']?>"></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td><input type="text" name="telepon" class="form-control" placeholder="No Telp. Anda" value="<?php echo $karyawan['telepon']?>"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" name="gender" value="pria" class="form-check-input" <?php if($karyawan['jenis_kelamin'] == 'pria') echo('checked') ?>> <label for="pria" class="form-check-label">Pria</label>
                            <input type="radio" name="gender" value="wanita" class="form-check-input" <?php if($karyawan['jenis_kelamin'] == 'wanita') echo('checked') ?> > <label for="wanita" class="form-check-label">Wanita</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td><input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir Anda" value="<?php echo $karyawan['tempat_lahir'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" name="tanggal" class="form-control" value="<?php echo $karyawan['tanggal_lahir'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea name="alamat" cols="50" rows="5" class="form-control" placeholder="Alamat Anda"><?php echo $karyawan['alamat'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                            <a href="./index.php" class="btn btn-danger">Cancel</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    <?php
    $update_data = [];
    updateData($dbhost, $dbuser, $dbpass, $dbname, $port, $dbtable, $update_data);
    ?>
    </body>
    </html>
?>