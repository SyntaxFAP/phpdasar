<?php 
require "functions.php";
$siswa = query("SELECT * FROM dataSiswa");
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

    <a href="tambah.php">Tambah data siswa</a>
    <br><br>

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
                <a href="">Ubah</a> |
                <a href="hapus.php?id=<?= $row['id'];?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php $angka++; ?>
        <?php endforeach; ?>

    </table>
</body>
</html>