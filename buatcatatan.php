<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location: login.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <link rel="stylesheet" href="css/indexstyle.css">
  <title>CataKu | Catatan Keuanganku</title>
</head>

<body>
  <?php include "navbar.php" ?>
  <?php include "db.php" ?>
  <div class="text">
    <p>
    <h2><i class="bi bi-pencil-fill"></i>&nbsp;Buat Catatan</h2>
    </p>
  </div>

  <div class="card w-50 mx-auto my-3">
    <div class="card-body">
      <h5 class="card-title">Catatan Keuangan</h5>
      <p class="card-text">Solusi pencatatan keuangan.</p>
      <a href="keuangan.php" class="btn">Buat Catatan Keuangan</a>
    </div>
  </div>

  <div class="card w-50 mx-auto mb-3">
    <div class="card-body">
      <h5 class="card-title">Catatan Hutang</h5>
      <p class="card-text">Cara mengingat anti tenggat.</p>
      <a href="hutang.php" class="btn">Buat Catatan Hutang</a>
    </div>
  </div>
  
  <div class="card w-50 mx-auto mb-4">
    <div class="card-body">
      <h5 class="card-title">Catatan Tabungan</h5>
      <p class="card-text">Memudahkanmu mewujudkan impianmu.</p>
      <a href="tabungan.php" class="btn">Buat Catatan Tabungan</a>
    </div>
  </div>
  
</body>

</html>