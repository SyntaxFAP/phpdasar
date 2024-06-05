<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "project");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nama = htmlspecialchars($_POST['nama']);
    $nis = htmlspecialchars($_POST['nis']);
    $rayon = htmlspecialchars($_POST['rayon']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    $query = "INSERT INTO dataSiswa VALUES(
        null, '$nama', '$nis', '$rayon', '$jurusan'
    )";

    $result = mysqli_query($conn, $conn);

    
}
?>