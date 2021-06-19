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

      /* Style the submit button */
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

      /* Add a background color to the submit button on mouse-over */
      input[type=submit]:hover {
        background-color: #45a049;
      }
    </style>
    <?php
      if (isset($_GET['edit'])) {
        $idProf = $_GET['edit'];
    ?>
    <form action="" method="post">
      <label for="Prof">Modifier Professeur</label>

    <?php
      $query = "SELECT * FROM professeurs WHERE professeurID = $idProf";
      $selectProfId = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($selectProfId)) {
        $idProf = $row['professeurID'];
        $nom = $row['professeurName'];
     ?>
        <input value="<?php if (isset($nom)) {
                        echo "$nom";
                      } ?>" type="text" class="from_control" name="modifier_nomProf" />
        <input class="btn btn-primary" type="submit" name="modifier_Prof" value="Modifier">
    </form>
    
    <?php }
    } ?>

    <?php
      if (isset($_POST['modifier_Prof'])) {

        $nom = $_POST['modifier_nomProf'];

        if (!empty($nom)) {
          $query = "UPDATE professeurs SET professeurName = '{$nom}' WHERE professeurID = {$idProf}";
          $updateQuery = mysqli_query($conn, $query);
        }
        if (!$updateQuery) {
          die("Query Error " . mysqli_error($conn));
        }

        header("Location: index.php");
      }
    ?>
