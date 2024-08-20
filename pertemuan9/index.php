<?php 
require "functions.php";

// mengambil data dari tabel siswa  / query data siswa
$siswa = query();

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
        <thead>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Email</th>
            <th>Jurusan</th>
        </thead>
        <?php $numbers = 1;  ?>
        <?php foreach($siswa as $row) : ?>
        <tbody>
            <td><?= $numbers ?></td>
            <td>
                <a href="">ubah</a> | 
                <a href="">hapus</a>
            </td>
            <td>
                <img src="img/<?= $row["gambar"] ?>" alt="me" width="50">
            </td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["nis"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
        </tbody>
        <?php $numbers++;  ?>
        <?php endforeach;  ?>
    </table>
</body>
</html>