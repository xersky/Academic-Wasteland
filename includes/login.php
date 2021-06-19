<?php
  include "db.php";

  session_start();

  $username_err = "";

  $pwd_err = "";

  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM admnistrateurs WHERE adminName = '{$username}'";
    $selectUserQuery = mysqli_query($conn, $query);
    
    if (!$selectUserQuery) {
      die("QUERY FAILED". mysqli_error($conn));
    }
      
    while ($row = mysqli_fetch_array($selectUserQuery)) {
        $dbUid = $row['adminName'];
        $dbPwd = $row['adminPassword'];
        $dbRole = $row['adminRole'];
    }

    if (empty($dbUid)) {
      $username_err = "Utilisateur inexistant"; 
    } else if ($password !== $dbPwd) {
      $pwd_err = "Le mot de passe est faux";
    }else if ($username == $dbUid && $password == $dbPwd) {
      session_start();
      
      $_SESSION['adminID'] = $dbUid;
      $_SESSION['adminRole'] = $dbRole;

      header("Location: ./admin/index.php");
    } else {
      header("Location: ../adLogin.php");
    }

    mysqli_close($conn);
  } 
