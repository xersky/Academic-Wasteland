
  <?php
  if (isset($_GET['edit'])) {
    $idSalle = $_GET['edit'];
  ?>
    <form action="" method="post">
      <label for="Salle">Modifier Salle</label>

      <?php
      $query = "SELECT * FROM salles WHERE salleID = $idSalle";
      $selectModuleId = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($selectModuleId)) {
        $id_salle = $row['salleID'];

      ?>

        <input value="<?php if (isset($num_salle)) {
                        echo "$id_salle";
                      } ?>" type="text" class="from_control" name="modifier_numSal" required/>
        <input class="btn btn-primary" type="submit" name="modifier_salle" value="Modifier">
    </form>
  <?php }
    } ?>

  <?php
  if (isset($_POST['modifier_salle'])) {

    $numSalle = $_POST['modifier_numSal'];

    if (!empty($numSalle)) {
      $query = "UPDATE salles SET salleID = '{$numSalle}' WHERE salleID = {$idSalle}";
      $updateQuery = mysqli_query($conn, $query);
    } else {
      echo "Champ vide";
    }

    if (!$updateQuery) {
      echo "<script>alert(\"Operation can't be done!\")</script>";
    }

    header("Location: index.php");
  }
  ?>