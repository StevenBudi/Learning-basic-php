<?php
    include './header.php';
    headerDecor();
    error_reporting(E_ALL^E_NOTICE);
    function hitungDenda($tglWajib, $tglKembali){
        $tglWajib = preg_split("[\D]", $tglWajib, 3);
        $tglKembali = preg_split("[\D]", $tglKembali, 3);

        [$year1, $month1, $day1] = $tglWajib;
        [$year2, $month2, $day2] = $tglKembali;

        $jd1 = gregoriantojd($month1, $day1, $year1);
        $jd2 = gregoriantojd($month2, $day2, $year2);
        if ($jd2-$jd1 >= 0){
            return "Rp. ".($jd2 - $jd1)*3000;
        }else return "Rp. 0";
    }

    echo("Besar Dendanya adalah ".hitungDenda("2021-03-31", "2021-04-04"));

    echo('
    <form action="" method="get">
        <input type="date" name="date1" id="date1">
        <input type="date" name="date2" id="date2">
        <button type="submit">Calculate</button>
    </form>
    ');
    echo("Besar Dendanya adalah ".hitungDenda($_GET['date1'], $_GET['date2']));
