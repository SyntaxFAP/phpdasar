<?php 
// Membuat array
$hari = array("Senin", "Selasa", "Rabu");
$bulan = ["Januari", "Februari", "Maret"];
$arr = [
    [1, 2, 3, 4, 5, 6, 7, 8, 9],
    [9, 8, 7, 6, 5, 4, 3, 2, 1]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak {
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 60px;
            float: left;
            transition: 1s;
            background-color: salmon;
            margin: 5px;
        }
        .kotak:hover{
            transform: rotate(360deg);
            border-radius: 50%;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <?php foreach($arr as $index) : ?>
        <div class="clear"></div>
        <?php foreach($index as $angka) : ?>
            <div class="kotak"><?= $angka; ?></div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</body>
</html>