<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> </title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav>
    <div class="nav-content">
      <div class="logo">
        <a href="index.php"><img src="css/ppp.png" alt="" style="width: 50px; height: 50px;"> Catatan Keuanganku</a>
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
        }
        else {
          echo '
          <li><a href="logout.php">Logout</a></li>          
          ';
        }
        ?>
      </ul>
    </div>
  </nav>
  <section class="home"></section>

  <script>
    let nav = document.querySelector("nav");
    window.onscroll = function() {
      if (document.documentElement.scrollTop > 20) {
        nav.classList.add("sticky");
      } else {
        nav.classList.remove("sticky");
      }
    }
  </script>

</body>

</html>