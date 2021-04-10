<?php
    include './header.php';
    headerDecor();
    echo("
    <style type='text/css'>
        table {
            position:absolute;
            left:33%;
            top:26.5%;
        }
        p{
            position:absolute;
            left:33%;
            top:23%;
        }
        table, th, tr, td{
            border : 1px solid black;
            padding:5px;
            margin:1px;
        }
    </style>
    
    
    ");
    // The date of right now
    $now = preg_split("[\D]", date("Y-m-d"), 3);
    [$year2, $month2, $day2] = $now;
    $jd2 = gregoriantojd($month2, $day2, $year2);

    //Calculate age
    function AgeCalculation(String $date1){
        $date1 = preg_split("[\D]", $date1,3);
        [$year1, $month1, $day1] = $date1;
        $jd1 = gregoriantojd($month1, $day1, $year1);
        return(intval(($GLOBALS["jd2"] - $jd1)/365.25));
    }

    echo('<h1 style="display:flex;justify-content:center;"><strong>Data Mahasiswa</strong></h1>');

    $file = "datamhs.dat";
    $myfile = fopen($file, "r") or die("Cannot read file !");
    echo("<table>");
    echo("
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mhs</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Usia (Thn)</th>
        </tr>
    ");
    $no = 1;
    while (!feof($myfile)) {
        echo("<tr>");
        $dataMhs = preg_split("[\|]", fgets($myfile), 4);
        
        if ($dataMhs[0] != '') {
            $ageMhs = AgeCalculation($dataMhs[2]);
            echo("
                <td>$no</td>
                <td>$dataMhs[0]</td>
                <td>$dataMhs[1]</td>
                <td>$dataMhs[2]</td>
                <td>$dataMhs[3]</td>
                <td>$ageMhs Tahun</td>
            
            ");
            $no+=1;
        }
        echo("</tr>");
        
        
    }
    $no -=1;
    echo("</table>");
    echo("<p>Jumlah Data : $no</p>");
    
    
