<?php
include "includes/db.php";
include "includes/login.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>login page</title>
</head>

<body>
  <div class="rec">
    <h2> Login </h2>
    <form action="includes/login.php" method="post">
      <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Nom d'utilisateur">
      </div>

      <div class="form-group">
        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
      </div>
      <button class="btn btn-primary" name="login" type="submit">Se connecter</button>
    </form>
  </div>
</body>

</html>