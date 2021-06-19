<?php 
  include "../includes/db.php";
  ob_start();
  session_start();
?>

<?php
  if(isset($_SESSION['adminRole'])) {
    if($_SESSION['adminRole'] !== 'Admin') {
      header("Location: ../index.php");
    }
  } else if (!isset($_SESSION['adminRole'])) {
    header("Location: ../index.php");
  }