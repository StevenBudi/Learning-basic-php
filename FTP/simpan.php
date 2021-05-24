<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('./header.php');?>
</head>
<body>
    
</body>
</html>
<?php
// Simpan File
    $judul = trim($_POST['judul']);
    
    if(preg_match("[\W]{1,}", $judul)){
        ?>
        <script>ErrorAlert();</script>
        <?php
    }else{
        $author = trim($_POST['author']);
        $article = trim($_POST['artikel']);
        $namaFile = "files\{$judul}.txt";
        $file = fopen($namaFile, "w");
        fwrite($file, strtoupper($judul));
        fwrite($file, "\n\nAuthor : {$author}\n\n");
        fwrite($file, $article);
        fclose($file);
        ?>
        <script>SuccessAlert();</script>
        <?php
    }
?>