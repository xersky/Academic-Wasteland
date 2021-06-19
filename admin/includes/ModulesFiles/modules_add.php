<form action="" method="post">
  <label for="Module">Ajouter Module</label>
  <input type="text" class="form-control" name="nomModule">
  <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
</form>

<?php if (isset($_POST['submit'])) {
  $nom = $_POST['nomModule'];

  if ($nom == "" || empty($nom)) {
    echo "Le champ nom est vide";
  } else {
    $chquery = "select * from modules where moduleName='$nom'";
    $createmodulecheck = mysqli_query($conn, $chquery );
    if(!mysqli_fetch_array($createmodulecheck)){
       $query = "INSERT INTO modules(moduleName) " . "VALUE('{$nom}')";
       $createmoduleQuery = mysqli_query($conn, $query);
  	header("Location: index.php");
    }else{
	echo "<script>alert(\"duplicate Found\")</script>";
    }
  }
} ?>