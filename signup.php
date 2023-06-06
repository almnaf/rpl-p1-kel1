<?php

@include 'db.php';

session_start();

if(isset($_SESSION['login'])){
    header('location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);

  $select = " SELECT * FROM user WHERE email = '$email' ";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    echo "<script>alert('Error: Email sudah dipakai')</script>";

  } else {

    if ($pass != $cpass) {
      echo "<script>alert('Error: Password tidak sesuai')</script>";
    } else {
      $insert = "INSERT INTO user(email, username, password) VALUES('$email','$username','$pass')";
      mysqli_query($conn, $insert);
      header('location:login.php');
    }
  }
};

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>CataKu | Catatan Keuanganku</title>
  <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
  <div class="center">
    <h1>Signup</h1>
    <form action="" method="post">
    <div class="txt_field">
        <input type="text" name="email" id="email" required>
        <span></span>
        <label for="email">Email</label>
      </div>
      <div class="txt_field">
        <input type="text" name="username" id="username" required>
        <span></span>
        <label for="username">Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" id="password" required>
        <span></span>
        <label for="password">Password</label>
      </div>
      <div class="txt_field">
        <input type="password" name="cpassword" id="cpassword" required>
        <span></span>
        <label>Confirm Password</label>
      </div>
      <input type="submit" name="submit" value="Signup">
      <div class="signup_link">
        Already have an account? <a href="login.php">Login</a>
      </div>
    </form>
  </div>

</body>

</html>