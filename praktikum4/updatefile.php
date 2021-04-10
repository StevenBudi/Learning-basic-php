<?php
    include './header.php';
    headerDecor();
    $namaFile = "myfile.txt";
    $myfile = fopen($namaFile, "a") or die("Tidak bisa buka file!");
    fwrite($myfile, "DOS = Disk Operating System\n");
    fclose($myfile);
    $myfile = fopen($namaFile, 'r') or die("Failed on reading file!");
    while (!feof($myfile)) {
        echo fgets($myfile);
    }
    fclose($myfile);


    /*
    3.	Apa kegunaan dari function fwrite()?
    Jawab : Menuliskan sesuatu pada file
    4.	Apa yang terjadi jika perintah fopen($namaFile, "a") diganti dengan fopen($namaFile, "w")?
    Jawab : Maka isi file sebelumnya akan ter-overwrite jika kita menjalankan function fwrite()


    */