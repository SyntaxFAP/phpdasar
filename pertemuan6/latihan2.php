<?php 
// ASSOCIATIVE ARRAY
// key-nya adalah string yg kita buat sendiri
$students = [
    ["nama" => "Fikri Akbar Pratama", "nis" => "12309658", "jurusan" => "Teknik Informatika", "gambar" => "4957092.jpg", "email" => "fikriakbarpratama@smkwikrama.sch.id"],
    ["nama" => "Rasyd Gobles", "nis" => "12309990", "jurusan" => "Teknik Informatika", "gambar" => "4957092.jpg", "email" => "rasydsholihakim@smkwikrama.sch.id"]
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            float: left;
        }
    </style>
</head>
<body>
    <?php foreach($students as $student) : ?>
        <ul>
            <li>
                <img src="img/<?= $student["gambar"]; ?>">
            </li>
            <li>Nama : <?= $student["nama"]; ?></li>
            <li>NIS : <?= $student["nis"]; ?></li>
            <li>Jurusan : <?= $student["jurusan"]; ?></li>
            <li>Email : <?= $student["email"] ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>