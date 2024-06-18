<?php
  session_start();

  // Jika session "email" tidak ada, maka redirect ke index.php
  if (empty($_SESSION["email"])) {
    header("location: index.php");
  }
?>

YIPPEEE Anda berhasil login!
