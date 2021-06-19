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
    include "./includes/ModulesFiles/modules_add.php";
  }

  if (isset($_GET['edit'])) {
    include "./includes/ModulesFiles/modules_modify.php";
  }

  if (isset($_GET['del'])) {
      $idMod = $_GET['del'];
      $query2 = "DELETE FROM examens WHERE module = {$idMod}";
      $delete_query2 = mysqli_query($conn, $query2);
      $query1 = "DELETE FROM modules WHERE moduleID = {$idMod}";
      $delete_query1 = mysqli_query($conn, $query1);
      header("Location: index.php");
    }
  ?>
</body>

</html>