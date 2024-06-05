<?php 
require "functions.php";
$siswa = query("SELECT * FROM dataSiswa");


// ambil data dari (fetch) siswa dari object result
// mysqli_fetch_row() // mengembalikkan array numerik
// mysqli_fetch_assoc() // mengembalikkan array associative
// mysqli_fetch_array() // mengembalikkan keduannya
// mysqli_fetch_object() // mengembalikkan object
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Rayon</th>
            <th>Action</th>
        </tr>

        <?php $angka = 1; ?>
        <?php foreach($siswa as $row) : ?>
        <tr>
            <td><?= $angka; ?></td>
            <td><?= $row['gambar'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['nis'] ?></td>
            <td><?= $row['rayon'] ?></td>
            <td>
                <a href="">Ubah</a>
                <a href="">Hapus</a>
            </td>
        </tr>
        <?php $angka++; ?>
        <?php endforeach; ?>

    </table>
</body>
</html>