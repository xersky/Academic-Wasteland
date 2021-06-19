<?php
include "../includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
      input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type=submit] {
        width: 100%;
        background-color: #303030;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type=submit]:hover {
        background-color: #45a049;
      }
  </style>
</head>

<body>
  <?php
  if (isset($_GET['add'])) {
    include "./includes/ProfsFiles/professeurs_add.php";
  }?>
  <?php
  if (isset($_GET['edit'])) {
    include "./includes/ProfsFiles/professeurs_modify.php";
  }
  ?>
  <?php
    if (isset($_GET['del'])) {
      $idProf = $_GET['del'];
      $query2 = "DELETE FROM examens WHERE professeur = {$idProf}";
      $delete_query = mysqli_query($conn, $query2);
      $query1 = "DELETE FROM professeurs WHERE professeurID = {$idProf}";
      $delete_query = mysqli_query($conn, $query1);
      header("Location: index.php");
    }
  ?>
</body>
</html>