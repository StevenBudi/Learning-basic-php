<!-- Baca File -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./header.php'); ?>
    <title>FTP - Show</title>
</head>

<body>
    <?php include('./navbar.php'); ?>
    <main>
        <div class="container container-fluid mt-5">
            <div class="row">
                <div class="card col-lg-3 col-sm-6">
                    <div class="card-body">
                        <h4 class="card-title">Daftar File</h4>
                        <hr>
                        <p class="card-text">
                            <ul>
                                <?php
                                    $file = array_diff(scandir("files/"), array(".", ".."));
                                    foreach ($file as $filename) {
                                        ?>
                                        <li>
                                            <a href="baca.php?file=<?= $filename?>"><?= $filename?></a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </p>
                    </div>
                </div>
                <div class="card col-lg-9 col-sm-6">
                    <div class="card-body">
                        <h4 class="card-title">Isi File</h4>
                        <hr>
                        <p class="card-text">
                        <?php
                        if(isset($_GET['file'])){
                            $cursor = fopen("./files/{$_GET['file']}", "r");
                            while(!feof($cursor)){
                                echo(fgets($cursor)."<br />");
                            }
                        }
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
