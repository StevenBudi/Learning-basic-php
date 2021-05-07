<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./asset/style/style.css" type="text/css"> -->
    <style>
        <?php include('./asset/style/style.css')?>
    </style>
</head>
<body>
    <?php include('./asset/template/navbar.php') ?> 
    <div class="container container-fluid home-container">
        
        <h1>Hello World</h1>

        <div class="toReserve">
            <a href="./reserve.php" class="btn btn-primary reserve-button">Reserve Now</a>
        </div>
    </div>
    
    <?php include('./asset/template/footer.php')?> 
    <script>
        <?php include('./asset/js/index.js')?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>