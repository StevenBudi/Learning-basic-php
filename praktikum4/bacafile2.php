<?php
    include './header.php';
    headerDecor();
    $namaFile = "myfile.txt";
    $myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");
    while (!feof($myfile)) {
        echo fgets($myfile);
    }
    fclose($myfile);


    /*
    2.	Jalankan script di atas, dan amati hasilnya! Apakah output yang dihasilkan sama dengan script bacafile.php? 
    Jika sama, apa kesimpulannya? Dan jelaskan apa perbedaan cara kerja dari kedua script tersebut!
    Jawab : 
    - Output yang dihasilkan oleh kedua file sama, kesimpulannya adalah kita bisa membaca file dalam PHP dengan menggunakan 2 cara yaitu membaca baris satu -persatu 
        atau membaca karakternya satu - persatu.
    - Script bacafile2.php membaca program dengan menggunakan pointer. Selama pointer masih menunjuk pada baris yang berisi data maka 
        data tersebut akan di echo oleh program. Sedangkan script bacafile.php membaca data sesuai dengan jumlah byte data (karakter) 
        yang ada pada file.
    Dengan menggunakan fread() maka program akan membaca karakter pada file satu - persatu
    3.	Jelaskan kegunaan dari function berikut ini:
        a.	feof()
        Jawab: Mengecek pointer program pada file menunjukan EOF (end-of-file) / bagian akhir pada file
        b.	fgets()
        Jawab: Mendapatkan data baris pada sebuah file sesuai dengan posisi pointer program berada


    */
