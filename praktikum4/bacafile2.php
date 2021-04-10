<?php
    include './header.php';
    headerDecor();
    $namaFile = "myfile.txt";
    $myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");
    while (!feof($myfile)) {
        echo fgets($myfile);
    }
    fclose($myfile);


    /*
    3.	Jelaskan kegunaan dari function berikut ini:
        a.	feof()
        Jawab: Mengecek pointer program pada file menunjukan EOF (end-of-file) / bagian akhir pada file
        b.	fgets()
        Jawab: Mendapatkan data baris pada sebuah file sesuai dengan posisi pointer program berada


    */
