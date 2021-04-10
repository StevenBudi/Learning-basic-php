<?php
    $file = "datamhs.dat";
    $myfile = fopen($file, "a");
    $NIM = $_POST['nim'];
    $NAMA = $_POST['nama'];
    $TGL = $_POST['tgllhr'];
    $LHR = $_POST['tmptlhr'];
    fwrite($myfile, $NIM."|".$NAMA."|".$TGL."|".$LHR."\n");
    fclose($myfile);
    $myfile = fopen($file, "r") or die("Failed or reading file!");
    while(!feof($myfile)){
        echo(fgets($myfile));
    }
    fclose($myfile);
    