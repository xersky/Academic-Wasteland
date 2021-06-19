<?php session_start();

  $_SESSION['adminID'] = null;
  $_SESSION['adminRole'] = null;

  header("Location: ../Main.php");
?>