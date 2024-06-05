<?php 
// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])) {
    // cek username dan password
    if($_POST["username"] == "fikri" && $_POST["password"] == "111227") {
        // Jika benar maka redirect ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        // jika salah maka buat var error bernilai true
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Admin</h1>
    <?php if(isset($error)) : ?>
        <h4 style="color: red;font-style: italic; ">username / password is incorrect</h4>
    <?php endif; ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password : </label>
                <input type="password" name="password" id="passwaord">
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </form>
    </ul>
</body>
</html>