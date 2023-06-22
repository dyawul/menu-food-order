<?php 
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <title>TAMBAH MENU MAKANAN</title>
</head>
<body>
    <div class="container">
        <h1>TAMBAH MENU MAKANAN</h1>
        <form method="POST" action="process.php?action=add">
  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <input type="text" class="form-control" id="category" name="category">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nama Makanan</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Deskripsi</label>
    <textarea name="body" id="body" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="tag" class="form-label">Tag</label>
    <input type="text" class="form-control" id="tag" name="tag">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
</body>
</html>