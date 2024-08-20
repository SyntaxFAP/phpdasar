<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
 
    // upload gambar
    $gambar = upload();

    if ( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO siswa 
                            VALUES
                        (null, '$nama', '$nis', '$email', '$jurusan', '$gambar');"
                    ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang dipilih
    if ( $error === 4 ){
        echo '
        <script>
            alert("pilih gambar terlebih dahulu!");
        </script>
    ';
    return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo '
        <script>
            alert("file yang anda upload bukan gambar!");
        </script>
    ';
    return false;
    }

    // cek apakah ukuran gambar tidak terlalu besar
    if ( $ukuranFile > 1000000 ) {
        echo '
        <script>
            alert("ukuran gambar yang anda upload terlalu besar!");
        </script>
    ';
    return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, "img/" . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function hapusSemua(){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa");
    return mysqli_affected_rows($conn);
}


function ubah($id, $data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ( $_FILES["gambar"]["error"] === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE siswa SET nama = '$nama', nis = '$nis', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM siswa
                        WHERE
                    nama LIKE '%$keyword%' OR
                    nis LIKE  '%$keyword%' OR
                    email LIKE  '%$keyword%' OR
                    jurusan LIKE  '%$keyword%'
                ";  
    return query($query);
}


function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek apakah username tersedia
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username';");
    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>alert('username sudah terdaftar!');document.location.href='registrasi.php';</script>";
        return false;
    }

    // cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>alert('konfirmasi password tidak sesuai!');document.location.href='registrasi.php';</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT); 

    // registrasi
    mysqli_query($conn, "INSERT INTO user VALUES (null, '$username', '$password')");
    return mysqli_affected_rows($conn);
}