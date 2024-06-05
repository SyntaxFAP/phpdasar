<?php 
// SUPERGLOBALS
// variable global milik php
// merupakan Array Associative
var_dump($_GET);
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
    <title>GET</title>
</head>
<body>
    <ul>
        <?php foreach($students as $std) : ?>
            <li>
                <a href="latihan2.php?nama= <?= $std["nama"]; ?>&nis=<?= $std["nis"]; ?>&jurusan=<?= $std["jurusan"]; ?>&email=<?= $std["email"]; ?>"><?= $std["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>