<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM siswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

// mengambil data dari tabel siswa  / query data siswa
$siswa = query("SELECT * FROM siswa LIMIT $awalData, $jumlahDataPerHalaman");

if ( isset($_POST["cari"]) ) {
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

    <a href="logout.php">Logout</a>

    <h1>Daftar Siswa</h1>

    <a href="tambah.php">Tambah data siswa</a> |
    <a href="hapusSemua.php" onclick="return confirm('hapus semua data?')">Hapus Semua Data</a>

    <form action="" method="post" style="margin: 10px 0px;">
        <input type="text" name="keyword" placeholder="masukkan keyword pencarian..." size="40" autofocus autocomplete="off">
        <button type="submit" name="cari">cari!</button>
    </form>

    <!-- navigasi -->
    <?php if ( $halamanAktif > 1 ) :  ?>
        <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
    <?php endif;  ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) :  ?>
        <?php if( $i == $halamanAktif ) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
        <?php else :  ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor;  ?>

    <?php if ( $halamanAktif < $jumlahHalaman ) :  ?>
        <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
    <?php endif;  ?>

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
        <?php  foreach ( $siswa as $row  ) : ?>
        <tbody>
            <td><?= $numbers ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Hapus?')">hapus</a>
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