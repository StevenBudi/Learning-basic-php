<?php
    include './header.php';
    headerDecor();
    echo("
        <style>
            table, th, tr, td{
                border: 1px solid black;
            }
        </style>
    ");
    $myfile = fopen('datatabung.dat', 'r');

    echo("<h1>Data Tabung</h1>");
    echo("<table>");
    echo("
        <tr>
            <th>NAMA TABUNG</th>
            <th>DIAMETER</th>
            <th>TINGGI</th>
            <th>LUAS</th>
        </tr>    
    ");
    while (!feof($myfile)){
        $data = preg_split("[\,]", fgets($myfile), 3);
        echo("<tr>");
        if($data[0] !=''){
            $view = "http://localhost/praktikum/praktikum5/hitungluas.php?n=$data[0]&d=$data[1]&t=$data[2]";
            
            echo("
                <td>$data[0]</td>
                <td>$data[1]</td>
                <td>$data[2]</td>
                <td><a href=$view target='_blank' rel='noopener noreferrer'>view</a></td>
            ");

            
        }
        echo("</tr>");
        


    }
    echo("</table>");