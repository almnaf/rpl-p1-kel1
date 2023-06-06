<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CataKu | Catatan Keuanganku</title>
  <link rel="stylesheet" href="css/welcomestyle.css">
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>

  <?php include "db.php" ?>

  <nav>
    <div class="nav-content">
      <div class="logo">
        <img src="css/ppp.png" alt="" style="width: 42px; height: 42px;"> 
        <a href="index.php">Catatan Keuanganku</a>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="buatcatatan.php">Buat Catatan</a></li>
        <li><a href="catatanku.php">Lihat Catatan</a></li>
        <?php
        if (!isset($_SESSION['login'])) {
          echo '
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Signup</a></li>
          ';
        } else {
          echo '
          <li><a href="logout.php">Logout</a></li>          
          ';
        }
        ?>
      </ul>
    </div>
  </nav>

  <section class="home"></section>

  <section class="sec-01 m">
    <div class="container">
      <h2 class="main-title">Apa Itu CataKu?</h2>
      <div class="content">
        <div class="image">
          <img src="css/img1.jpg" alt="">
        </div>
        <div class="text-box">
          <h3>CataKu</h3>
          <p>adalah aplikasi yang membantumu dalam mengelola dan melacak keuangan dengan mudah.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-02">
    <div class="container">
      <h3 class="section-title">Mengapa CataKu?</h3>
      <div class="content">
        <div class="image">
          <img src="css/img2.png" alt="">
        </div>
        <div class="info">
          <h4 class="info-title">Fleksibel dan Mudah</h4>
          <p><br>Dengan CataKu, kamu dapat mengelola catatan sesuai dengan preferensi dan kebutuhan. Catatan keuangan, hutang, tabungan, semua tersedia di sini. <br><br>Antarmuka CataKu yang mudah dan intuitif tentu akan memberikanmu pengalaman mencatat yang berbeda. Kini, mencatat keuangan terasa sangat menyenangkan.</p><br>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-03">
    <div class="container">
      <h3 class="section-title">Bergabung Dan Rasakan Pengalaman Mencatat Keuangan Yang Menyenangkan</h3>
      <div class="content">
        <div class="image">
          <a href="login.php"><img src="css/img3.jpg" alt=""></a>
        </div>
      </div>
    </div>
  </section>

  <script>
    //common reveal options to create reveal animations
    ScrollReveal({
      //reset: true,
      distance: '60px',
      duration: 2500,
      delay: 400
    });

    //target elements, and specify options to create reveal animations
    ScrollReveal().reveal('.main-title, .section-title', {
      delay: 500,
      origin: 'left'
    });
    ScrollReveal().reveal('.sec-01 .image, .info', {
      delay: 600,
      origin: 'bottom'
    });
    ScrollReveal().reveal('.text-box', {
      delay: 700,
      origin: 'right'
    });
    ScrollReveal().reveal('.sec-02 .image, .sec-03 .image', {
      delay: 500,
      origin: 'top'
    });
    ScrollReveal().reveal('.media-info li', {
      delay: 500,
      origin: 'left',
      interval: 200
    });
  </script>

</body>

</html>