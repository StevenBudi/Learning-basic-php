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

    echo(
    "<div>
        <br>
        <h4>
            3.	Apa kegunaan dari function fwrite()?
            <br>
            Jawab : <strong>Menuliskan sesuatu pada file</strong>
            <br>
            4.	Apa yang terjadi jika perintah fopen(\$namaFile, 'a') diganti dengan fopen(\$namaFile, 'w')?
            <br>
            Jawab : <strong>Maka isi file sebelumnya akan ter-overwrite jika kita menjalankan function fwrite()</strong>

        
        </h4>
    </div>");
