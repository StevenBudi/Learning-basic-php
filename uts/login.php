<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <?php
        include('./header.php');
        headerDecor();
    ?>
    <div class="container container-fluid" style="position: absolute;top: 50%;left: 50%;z-index: 2;transform: translate(-50%, -50%);width: 80%;">
        <form action="proses.php" method="post" class="form-control-lg form-control">
            <h1 style="align-items: center;display:flex;justify-content: center;text-align:center;">Silahkan Login Terlebih Dahulu</h1>
            <br>
            <table class="table table-borderless">
                <tr>
                    <td>Nama    : </td>
                    <td><input type="text" name="username" class="form-control form-control-lg" placeholder="Masukkan nama anda..."></td>
                </tr>
                <tr>
                    <td>Email   :</td>
                    <td><input type="email" name="email" class="form-control form-control-lg" placeholder="Masukkan nama email anda ...."></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" style="position: relative; left:93%" name="submit">Submit</button>
        
        </form>
    </div>
</body>
</html>