<?php
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
    <style>
      form {
        border: 3px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
      button {
        background-color: black;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      button:hover {
        opacity: 0.8;
      }
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }
      .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
      }
      img.avatar {
        width: 25%;
        border-radius: 50%;
      }
      .container {
        padding: 16px;
      }
      span.psw {
        float: right;
        padding-top: 16px;
      }
      @media screen and (max-width: 300px) {
        span.psw {
          display: block;
          float: none;
        }
        .cancelbtn {
          width: 100%;
        }
      }
    </style>
    <form class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Nom d'utilisateur">
        <span class="help-block"><?php echo "${username_err}" ?></span>
      </div>

      <div class="form-group">
        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
        <span class="help-block"><?php echo "${pwd_err}" ?></span>
      </div>
      <button class="btn btn-primary" name="login" type="submit">Se connecter</button>
    </form>
  </div>
</body>

</html>