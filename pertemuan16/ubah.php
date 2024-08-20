<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require "functions.php";

$id = $_GET["id"];

if ( isset($_POST["submit"]) && !empty($_POST) ) {
    if ( ubah($id, $_POST) > 0 ) {
        echo '
            <script>
                alert("Data berhasil diubah!");
                document.location.href = "index.php";
            </script>
        ';
    } else {
        echo '
        <script>
            alert("Data gagal diubah!");
            document.location.href = "index.php";
        </script>
    ';
    }
}

$data = query("SELECT * FROM siswa WHERE id = $id")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Mengubah data siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $data["gambar"] ?>">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $data["nama"] ?>" required>
            </li>
            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" id="nis" value="<?= $data["nis"] ?>" required>
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="<?= $data["email"] ?>" required>
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $data["jurusan"] ?>" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label> <br>
                <img src="img/<?= $data["gambar"] ?>" alt="" width="60"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah data!</button> |
                <a href="index.php">Kembali</a>
            </li>
        </ul>
    </form>
</body>
</html>