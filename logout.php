<?php

@include 'db.php';

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('login', '', time() - 3600);

header('location:welcome.php');
exit;

?>