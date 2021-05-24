<!-- Homepage -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./header.php'); ?>
    <title>FTP - Home</title>
</head>

<body>
    <?php include('./navbar.php'); ?>

    <main>
        <div class="container container-fluid mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tulis Artikel Anda</h1>
                    <hr>
                    <form action="simpan.php" method="post" class="mt-2" onsubmit="return confirm('Simpan Data ? ')">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel Anda</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Nama Anda</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Artikel Anda</label>
                            <textarea name="artikel" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </main>
</body>

</html>