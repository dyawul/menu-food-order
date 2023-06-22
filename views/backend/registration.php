<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
require_once __DIR__ . "/../../Class/User.php";
$userClass = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" href="../../assets/image/logo.png">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
    <div><p><a href="../../home.php">Kembali</a></p></div>
        <?php $userClass->registration(); ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nama:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Komfirmasi password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Sudah Daftar? <a href="login.php">Login Disini</a></p></div>
      </div>
    </div>
</body>
</html>