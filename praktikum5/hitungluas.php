<?php
    include './header.php';
    headerDecor();

    $nama = $_GET['n'];
    $diameter = $_GET['d'];
    $tinggi = $_GET['t'];
    $volume = round(pi()*pow($diameter/2, 2)*$tinggi, 2);
    $luasp = round(2*pi()*pow($diameter/2, 2)) + round(pi()*$diameter*$tinggi);

    echo("<h1>Volume tabung $nama dengan diameter $diameter dan tinggi $tinggi adalah $volume satuan volume</h1>");
    echo "<h1>Luas Permukaan Tabung $nama dengan diameter $diameter dan tinggi $tinggi adalah $luasp satuan luas</h1>";