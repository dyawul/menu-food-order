<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
require_once __DIR__ .  "/../../Class/Menu.php";
$menuClass = new Menu();
$nameP = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/image/logo.png">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  
    <title>MENU MAKANAN</title>
</head>
<body>
    <div class="container">
    <h1>Hello, <?php echo $nameP ?> Welcome to Dashboard</h1>
        <h2>DAFTAR MENU MAKANAN</h2>
        <a href= "../backend/menu/add.php" class="btn btn-success btn-sm">Tambah</a>
        <a href= "../../home.php" class="btn btn-dark btn-sm">Home</a>
        <a href="logout.php" class="btn btn-secondary btn-sm">Logout</a>
        <table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kategori</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">tag</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $no = 1;
        $stmt = $menuClass->showData(); 
        foreach ($stmt as $menu) {
    ?>
    <tr>
      <th scope="row"><?php echo $no++; ?></th>
      <td><?php echo $menu['category']; ?></td>
      <td><?php echo $menu['name']; ?></td>
      <td><?php echo "Rp. " .$menu['price']; ?></td>
      <td><?php echo $menu['body']; ?></td>
      <td><?php echo $menu['tag']; ?></td>
      <td>
        <a href= "menu/edit.php?id=<?php echo $menu['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href= "menu/process.php?id=<?php echo $menu['id']; ?>&action=delete" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php
        }
        ?>
  </tbody>
</table>
    </div>
    
</body>
</html>