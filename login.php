<?php

@include 'db.php';

session_start();

if (isset($_COOKIE['login'])) {
  if($_COOKIE['login']==='true'){
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION['login'])) {
  header('location: index.php');
  exit;
}

if (isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);

  $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $row = mysqli_fetch_array($result);
    $_SESSION['login'] = true;
    $_SESSION['user_name'] = $row['username'];
    if (isset($_POST['remember'])) {
      setcookie('login', 'true', time() + 60);
    }
    header('location:index.php');
  } else {
    echo "<script>alert('Error: Email atau password salah')</script>";
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
    <h1>Login</h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="email" required>
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="pass">
        <input type="checkbox" name="remember" id="remember"> Remember me
      </div>
      <input type="submit" name="submit" value="Login">
      <div class="signup_link">
        Don't have an account? <a href="signup.php">Signup</a>
      </div>
    </form>
  </div>

</body>

</html>