<?php 

// Pengulangan
// for
// for ($i = 1; $i < 11 ; $i++) {
//     echo "Selamat pagi! <br>";
// }
// while
// $i = 1;
// while ($i < 11) {
//     echo "Selamat Pagi! <br>";
//     $i++;
// }
// do while : mencetak terlebih dahulu kemudian kondisi
// $i = 28; 
// do {
//     echo "Selamat Pagi! <br>";
//     $i++;
// }while($i < 27)
// foreach : pengulangan khusus array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
    <style>
        .warna-baris {
            background-color: blanchedalmond;
        }
    </style>
</head>
<body>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
            <?php if( $i % 2 == 1 ) : ?>
            <tr class="warna-baris">
            <?php else: ?>
                <tr></tr>
            <?php endif; ?>
                <?php for( $j = 1; $j <= 5; $j++ ) : ?>
                    <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    

</body>
</html>