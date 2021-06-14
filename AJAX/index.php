<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>AJAX Practice</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Javascript</a>
                        </li>
                        <li class="nav-item">
                            <a href="jquery.php" class="nav-link">Jquery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid mt-3">
            <div class="row d-flex justify-content-center">
                <div class="spinner-grow text-primary" role="status" style="display: none; position:absolute; top:50%">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dependent Dropdown Wilayah Indonesia</h5>
                            <hr>
                            <form method="post">
                                <div class="form-group">
                                    <label for="province" class="control-label col-sm-3">Provinsi : </label>
                                    <div class="col-sm-12">
                                        <?php
                                        include('koneksi.php');
                                        $province = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
                                        ?>
                                        <input type="text" name="province" id="province" onclick="getCity()"  class="form-control mt-1 mb-1" list="provinceData" placeholder="Type Your Province...">
                                        <datalist name="provinceData" id="provinceData">
                                            <?php
                                            while ($data = mysqli_fetch_assoc($province)) {
                                            ?>
                                                <option id="<?= $data['id'] ?>" value="<?= $data['name'] ?>">
                                                <?php
                                            }
                                                ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label col-sm-3">Kota/Kabupaten :</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="city" id="city" onclick="getDistrict()" class="form-control mt-1 mb-1" placeholder="Type Your City..." list="cityData">
                                        <datalist name="cityData" id="cityData">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="district" class="control-label col-sm-3">Kecamatan : </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="district" id="district" onclick="getResident()" class="form-control mt-1 mb-1" placeholder="Type Your District..." list="districtData">
                                        <datalist name="districtData" id="districtData">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="resident" class="control-label col-sm-3">Kelurahan : </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="resident" id="resident" class="form-control mt-1 mb-1" placeholder="Type Your Resident..." list="residentData">
                                        <datalist name="residentData" id="residentData">
                                        </datalist>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>