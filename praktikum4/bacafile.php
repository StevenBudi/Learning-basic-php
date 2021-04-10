<?php
    include './header.php';
    headerDecor();
    $file = "myfile.txt";
    $myfile = fopen($file, "r") or die("Tidak bisa buka file");
    echo(fread($myfile, filesize($file)));
    fclose($myfile);

    /*
    a.	Apakah kegunaan dari function fopen()? Dan jelaskan maksud dari parameter yang ada di dalam function fopen() tersebut!
    Jawab: Membuka file $file adalah nama file sedangkan "r" adalah mode read.
    b.	Apa kegunaan dari function die()?
    Jawab: Jika fopen menemui error maka die akan dijalankan (sama seperti try dan catch)
    c.	Apa kegunaan dari function fread()? Jelaskan maksud maksud dari parameter yang ada di dalam function fread() tersebut!
    Jawab: Membaca keseluruhan isi file
    d.	Apa kegunaan dari function fclose()? Bagaimana jika tidak menggunakan function ini setelah operasi file selesai?
    Jawab: Ada kemungkinan isi file akan berubah atau terjadi error pada file


    */
