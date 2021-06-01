<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin TMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="bootstrap-logo" width="60" height="48">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav" style="justify-content: center;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5 py-1">
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning mx-2" href="./serverside.php">Server Side</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info mx-2" href="./index.php">Client Side</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Tinggi Permukaan Air</h5>
                            <hr>
                            <table id="tabel-data" class="table table-striped table-bordered" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pos</th>
                                        <th>Nilai</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('./koneksi.php');
                                    $tma = mysqli_query($conn, "SELECT * FROM tma");
                                    if (mysqli_num_rows($tma) == 0) {
                                        die("Fetching Data Error    : " . mysqli_error($conn));
                                    } else {
                                        while ($data = mysqli_fetch_assoc($tma)) {
                                    ?>
                                            <tr>
                                                <td><?= $data['id_tma']; ?></td>
                                                <td><?= $data['id_pos']; ?></td>
                                                <td><?= $data['nilai']; ?></td>
                                                <td><?= $data['waktu']; ?></td>
                                                <td style="display:flex; align-items:center; justify-content: center;">
                                                    <button class="btn btn-primary mx-2">Edit</button>
                                                    <button class="btn btn-danger mx-2">Delete</button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script>
        const table = new simpleDatatables.DataTable("#tabel-data", {
            // Change False to disable search
            searchable: true,
            // Labels
            labels: {
                placeholder: "Search Something...",
                perPage: "{select} entries per page",
                noRows: "No entries to found",
                info: "Showing {start} to {end} of {rows} entries",
            },
            // Layout position
            layout: {
                top: "{select}{search}",
                bottom: "{info}{pager}"
            },
            // Sort Date
            columns: [{
                select: 2,
                type: "date",
                format: "MYSQL"
            }]
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>