<?php
include "../includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
      form {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      form div, 
      .input-holder {
            width: 100%;
      }
      .form>*:nth-child(6), .input-holder:nth-of-type(6),
      .form>*:nth-child(7), .input-holder:nth-of-type(7) {
            width: 75%;
      }
      .duration {
        padding: 12px 20px;
        font-size: 14px;
	    }
       input[type=range], select {
        width: 75%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
	    input[type=number], select {
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
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
      .date {
        padding: 12px 20px;
        width:96.75%;
        font-size: 14px;
      }
  </style>
</head>
<body>
  <?php 
  if (isset($_GET['edit'])) {
    include "./includes/ExamsFiles/exams_modify.php";
  }
  else if (isset($_GET['del'])) {
    $Id_exam = $_GET['del'];
    $query = "DELETE FROM examens WHERE examenID = {$Id_exam}";
    $delete_query = mysqli_query($conn, $query);
    header("Location: index.php");
  }else{
    include "./includes/ExamsFiles/exam_Add.php";
  }
  ?>
</body>
</html>
