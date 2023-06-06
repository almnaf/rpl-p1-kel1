<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: welcome.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CataKu | Catatan Keuanganku</title>

    <link rel="stylesheet" href="css/indexstyle.css">
</head>

<body>
    <?php include "navbar.php" ?>
    <?php include "db.php" ?>
    <div class="text">
        <p>
        <h2><i class="bi bi-house-door-fill"></i>&nbsp;Home</h2>
        </p>
    </div>

    <div class="container">

        <div class="content">
            <h3>Halo, <span><?php echo $_SESSION['user_name'] ?> !</span></h3>
            <h1>Selamat datang di <span>Catatan Keuanganku</span></h1>
            <p>Mau apa hari ini?</p>
            <a href="buatcatatan.php" class="btn"><i class="bi bi-pencil-fill"></i>&nbsp;&nbsp;Buat Catatan</a>
            <a href="catatanku.php" class="btn"><i class="bi bi-journal-text"></i>&nbsp;&nbsp;Lihat Catatan</a>
        </div>
        
    </div>

</body>

</html>