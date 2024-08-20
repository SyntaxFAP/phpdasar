<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM siswa");
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
