<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
     global $conn;
     $nama = htmlspecialchars($data['nama']);
     $nis = htmlspecialchars($data['nis']);
     $rayon = htmlspecialchars($data['rayon']);

     $query = "INSERT INTO dataSiswa
                    VALUES
                (null, '$nama', '$nis', '$rayon')
            ";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM dataSiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}
?>