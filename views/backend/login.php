<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
require_once __DIR__ . "/../../Class/Login.php";
$loginClass = new Login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="shortcut icon" href="../../assets/image/logo.png">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    
    <div class="container">
    <div><p><a href="../../home.php">Kembali</a></p></div>
        <?php
            $loginClass->cekUser();
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Masukan Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Masukan Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Belum punya akun? <a href="registration.php">Daftar di sini</a></p></div>
    </div>
</body>
</html>