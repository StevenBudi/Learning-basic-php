<?php
    include './header.php';
    headerDecor();

    function hitungGaji($gol, $masaKerja){
        if ($gol == "A") {
            if ($masaKerja >= 10) {
                $gaji = 7000000;
            } else {
                $gaji = 5000000;
            }
            
        } else if ($gol === "B") {
            if ($masaKerja < 10) {
                $gaji = 6000000;
            } else {
                $gaji = 8000000;
            }
        } else{
            $gaji = 0;
        }
        return $gaji;
    }
    $pay = hitungGaji("A", 8);
    echo("<h1>Rp. ".number_format($pay, 2, ",", ".")."</h1>")

?>