<?php
    include './header.php';
    headerDecor();

    $nama = $_GET['n'];
    $diameter = $_GET['d'];
    $tinggi = $_GET['t'];
    $luas = round(pi()*pow($diameter/2, 2)*$tinggi, 2);

    echo("<h1>Volume tabung $nama dengan diameter $diameter dan tinggi $tinggi adalah $luas satuan luas</h1>");