<?php
    include './header.php';
    headerDecor();
    $namaFile = "myfile.txt";
    $myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");
    while (!feof($myfile)) {
        echo fgets($myfile);
    }
    fclose($myfile);
    echo("<hr>");
    echo(
    "<div style='top:30%;position:absolute;overflow-y:auto;'>
        <br>
        <h4>
        2.	Jalankan script di atas, dan amati hasilnya! Apakah output yang dihasilkan sama dengan script bacafile.php? 
        <br>
        Jika sama, apa kesimpulannya? Dan jelaskan apa perbedaan cara kerja dari kedua script tersebut!
        <br>Jawab :
            <br> 
            <strong>
                - Output yang dihasilkan oleh kedua file sama, kesimpulannya adalah kita bisa membaca file dalam PHP dengan menggunakan 2 cara yaitu membaca baris satu -persatu 
                    <br>
                    atau membaca karakternya satu - persatu.
                    <br>
                    - Script bacafile2.php membaca program dengan menggunakan pointer. Selama pointer masih menunjuk pada baris yang berisi data maka 
                    <br>    
                    data tersebut akan di echo oleh program. Sedangkan script bacafile.php membaca data sesuai dengan jumlah byte data (karakter) 
                    <br>
                    yang ada pada file.
                    <br>
                Dengan menggunakan fread() maka program akan membaca karakter pada file satu - persatu
                <br>
            </strong>
        3.	Jelaskan kegunaan dari function berikut ini:
            <br>
            a.	feof()
            <br>
            Jawab: <strong>Mengecek pointer program pada file menunjukan EOF (end-of-file) / bagian akhir pada file </strong>
            <br>
            b.	fgets()
            <br>
            Jawab: <strong> Mendapatkan data baris pada sebuah file sesuai dengan posisi pointer program berada </strong

        
        </h4>
    </div>");
