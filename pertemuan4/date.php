<?php 

    // Build-in function
    // Date
    // Untuk menampilkan tanggal dengan format tertentu
    echo date("l, d-M-Y");
    echo "<br>";

    // Time
    // UNIX Timestamp / EPOCH time
    // Detik yang sudah berlalu sejak 1 Januari 1970
    // echo time();
    // echo date("l", time()+60*60*24*3);


    // mktime
    // membuat sendiri detik
    // parameter diisi oleh angka
    // mktime(0, 0, 0, 0, 0, 0)
    // mktime(jam, menit, detik, bulan, tanggal, tahun)
    echo date("l", mktime(0, 0, 0, 12, 11, 2007));
    echo "<br>";


    // strtotime
    // strtotime berkebalikan dengan mktime
    // parameter diisi oleh string
    echo date("m", strtotime("11 dec 2007"));
    echo "<br>";


    // Function yang sering dipakai / sering dipakai di seri UNPAS
    // String
    // strlen()
    // menghitung panjang/length dari sebuah string
    // strcmp()
    // membandingkan dua buah string
    // explode
    // untuk memecah sebuah string menjadi array
    // htmlspecialchars()
    // function khusus untuk menjaga kita dari orang yang iseng ingin masuk kedalam website kita(hacker)

    // Utility
    // var_dump()
    // sebuah fungsi untuk mencatak isi dari sebuah variabel, objek, array
    // isset()
    // untuk mengecek apakah sebuah variable sudah dibuat
    // empty()
    // untuk mengecek apakah sebuah variable memiliki nilai atau tidak
    // die()
    // untuk memberhentikan program : program yang dibawah fungsi tidak akan dieksekusi
    // sleep()
    // untuk memberhentikan sementara sebuah program


?>