  <?php
  if (isset($_GET['edit'])) {
    $idMod = $_GET['edit'];
  ?>
    <form action="" method="post">
      <label for="Module">Modifier Module</label>

      <?php
      $query = "SELECT * FROM modules WHERE moduleID = $idMod";
      $selectModuleId = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($selectModuleId)) {
        $id_module = $row['moduleID'];
        $nom_module = $row['moduleName'];

      ?>

        <input value="<?php if (isset($nom_module)) {
                        echo "$nom_module";
                      } ?>" type="text" class="from_control" name="modifier_nomMod" />
        <input class="btn btn-primary" type="submit" name="modifier_Module" value="Modifier">
    </form>
  <?php }
    } ?>
  <?php
  if (isset($_POST['modifier_Module'])) {

    $nom = $_POST['modifier_nomMod'];

    if (!empty($nom)) {
      $query = "UPDATE modules SET moduleName = '{$nom}' WHERE moduleID = {$idMod}";
      $updateQuery = mysqli_query($conn, $query);
    } else {
      Echo "Champ vide";
    }

    if (!$updateQuery) {
      die("Query Error " . mysqli_error($conn));
    }

    header("Location: index.php");
  }
  ?>