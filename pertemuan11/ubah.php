<?php 
require "functions.php";

// mengambil data id melalui url 
$id = $_GET['id'];

// query data siswa berdasarkan id
$sw = query("SELECT * FROM dataSiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah disubmit atau belum
if(isset($_POST['ubah'])) {
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data gagal diubah!');
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
        <input type="hidden" name="id" value="<?= $sw['id'] ?>">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type='text' name='nama' id="nama" value="<?= $sw['nama'] ?>" required>
            </li>
            <li>
                <label for="nis">NIS :</label>
                <input type='text' name='nis' id="nis" value="<?= $sw['nis'] ?>" required>
            </li>
            <li>
                <label for="rayon">Rayon</label>
                <input type='text' name='rayon' id='rayon' value="<?= $sw['rayon'] ?>" required>
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data!</button>
            </li>
        </ul>
    </form>

</body>
</html>