<?php
    include './header.php';
    headerDecor();
    $file = "myfile.txt";
    $myfile = fopen($file, "r") or die("Tidak bisa buka file");
    echo(fread($myfile, filesize($file)));
    fclose($myfile);
    echo("<br>
    <div style='top:50%;position:fixed;'>
        <h4>
        a.	Apakah kegunaan dari function fopen()? Dan jelaskan maksud dari parameter yang ada di dalam function fopen() tersebut!
        <br>
        Jawab: <strong>Membuka file \$file adalah nama file sedangkan 'r' adalah mode read. </strong>
        <br>
        b.	Apa kegunaan dari function die()?
        <br>
        Jawab: <strong>Jika fopen menemui error maka die akan dijalankan (sama seperti try dan catch)</strong>
        <br>
        c.	Apa kegunaan dari function fread()? Jelaskan maksud maksud dari parameter yang ada di dalam function fread() tersebut!
        <br>
        Jawab: <strong> Membaca keseluruhan isi file </strong>
        <br>
        d.	Apa kegunaan dari function fclose()? Bagaimana jika tidak menggunakan function ini setelah operasi file selesai?
        <br>
        Jawab: <strong> Ada kemungkinan isi file akan berubah atau terjadi error pada file <strong>
        </h4>
    </div>");
    
