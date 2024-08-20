<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// mengambil data dari tabel siswa  / query data siswa
$result = mysqli_query($conn, "SELECT * FROM siswa");

// ambil data (fetch) dari object result
// mysqli_fetch_row // mengembalikan array numerik
// mysqli_fetch_assoc // mengembalikan array associative
// mysqli_fetch_array // mengembalikan array numerik & associative
// mysqli_fetch_object // mengembalikkan nilai object

{
    
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
        <?php while( $row = mysqli_fetch_assoc($result) ) :  ?>
        <tbody>
            <td><?= $numbers ?></td>
            <td>
                <a href="">ubah</a> | 
                <a href="">hapus</a>
            </td>
            <td>
                <img src="img/4957092.jpg" alt="me" width="50">
            </td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["nis"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
        </tbody>
        <?php $numbers++;  ?>
        <?php endwhile;  ?>
    </table>
</body>
</html>