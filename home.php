<?php
require_once __DIR__ .  "/Class/Menu.php";
$menuClass = new Menu();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/image/logo.png">
    <link rel="stylesheet" href="assets/asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/asset/css/ubuntu.css">
    <title>Aplikasi Pemesanan Mandiri Menu Restoran | PMMR</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-warning navbar-dark fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Menunya</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="views/backend/registration.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="views/backend/login.php">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
<div id="content" class="container-fluid bg-light">
<section id="card-main" class="pt-5">
  <!-- <h2 class="text-center my-5">Menu</h2> -->
<div class="container">
  <div class="row gy-4">
    <?php
    $stmt = $menuClass->showData(); 
    foreach ($stmt as $menu) {
    ?>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="assets/upload/img/geprek1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $menu['name']; ?></h5>
          <p class="card-text opacity-75"><?php echo $menu['body'] ?></p>
          <p><h6 class="card-subtitle text-danger">Rp. <?php echo $menu['price']; ?></h5></p>
          <a href="#" class="btn btn-warning text-light">Tambah</a>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
</div>
</section>
</div>
<footer class="footer text-center py-5">
  <div class="container">
    <span>❤</span>
  </div>
</footer>
<script src="assets/asset/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>