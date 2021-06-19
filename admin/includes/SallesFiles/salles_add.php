  <form action="" method="post">
    <label for="Salle">Ajouter salle</label>
    <input type="text" class="form-control" name="numSalle">
    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
  </form>

<?php if (isset($_POST['submit'])) {
  $num_salle = $_POST['numSalle'];

  if ($num_salle == "" || empty($num_salle)) {
        echo "Field empty";
  } else {
    $chquery = "select * from salles where salleID='$num_salle'";
    $createsallecheck = mysqli_query($conn, $chquery );
    if(!mysqli_fetch_array($createsallecheck )){
       $query = "INSERT INTO salles(salleID) " . "VALUE('{$num_salle}')";
       $createSalleQuery = mysqli_query($conn, $query);
  	header("Location: index.php");
    }else{
	echo "<script>alert(\"duplicate Found\")</script>";
    }
  }
} ?>