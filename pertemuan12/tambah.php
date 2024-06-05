<?php 
require "functions.php";

// cek apakah tombol submit sudah disubmit atau belum
if(isset($_POST['submit'])) {
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
</head>
<body>
    <h1>Tambah data siswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type='text' name='nama' id="nama" required>
            </li>
            <li>
                <label for="nis">NIS :</label>
                <input type='text' name='nis' id="nis" required>
            </li>
            <li>
                <label for="rayon">Rayon</label>
                <input type='text' name='rayon' id='rayon' required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>

</body>
</html>