  <form action="" method="post">
    <label for="Prof">Ajouter Professeur</label>
    <input type="text" class="form-control" name="nomProf" required>
    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
  </form>
<?php if (isset($_POST['submit'])) {
  $nomProf = $_POST['nomProf'];

  if ($nomProf == "" || empty($nomProf)) {
      echo "Field empty";
    } else {
    $chquery = "select * from professeurs where professeurName='$nomProf'";
    $createprofcheck = mysqli_query($conn, $chquery );
    if(!mysqli_fetch_array($createprofcheck)){
       $query = "INSERT INTO professeurs(professeurName) " . "VALUE('{$nomProf}')";
       $createprofQuery = mysqli_query($conn, $query);
  	header("Location: index.php");
    }else{
	echo "<script>alert(\"duplicate Found\")</script>";
    }
  }
} ?>