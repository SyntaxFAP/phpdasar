<?php 
require "functions.php";
$siswa = query("SELECT * FROM dataSiswa");

// tombol cari ditekan
if (isset($_POST['cari'])){
    $siswa = cari($_POST["keyword"]);
}
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

    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Masukkan keyword pencarian.." autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

    <br>

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
                <a href="ubah.php?id=<?= $row['id'];?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['id'];?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php $angka++; ?>
        <?php endforeach; ?>

    </table>
</body>
</html>