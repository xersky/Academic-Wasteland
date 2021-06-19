<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST">
  <label for="Module">Ajouter Exam</label>
  <select name="Module" REQUIRED>
    <option value=''>module</option>
    <?php
    $query = "SELECT * FROM modules";
    $queryMod = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($queryMod)) {
      $idMod = $rows['moduleID'];
      $nomMod = $rows['moduleName'];

      echo "<option value='$idMod'>$nomMod</option>";
    }
    ?>
  </select>
  <select name="Salle" REQUIRED>
    <option value=''>salle</option>
    <?php
    $query = "SELECT * FROM salles";
    $querySalle = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($querySalle)) {
      $idSalle = $rows['salleID'];
      echo "<option value='$idSalle'>Salle : $idSalle</option>";
    }
    ?>
  </select>
  <select name="Professeur" REQUIRED>
    <option value=''>professeur</option>
    <?php
    $query = "SELECT * FROM professeurs";
    $queryProf = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($queryProf)) {
      $idProf = $rows['professeurID'];
      $nomProf = $rows['professeurName'];

      echo "<option value='$idProf'>$nomProf</option>";
    }
    ?>
  </select>
  </select>
  <input type="datetime-local" value="" class="date" name="dateExam" REQUIRED />
  <label for="duration">entrez la duration de l'Exam</label>
  <input type="range" min="0" max="523" id="mins" class="duration" name="duration" step="1" oninput="this.form.amountInput.value=this.value">
  <input type="number" name="amountInput" min="0" class="duration" max="523" value="0" oninput="this.form.duration.value=this.value" />
  <input class="btn btn-primary" type="submit" name="submit" value="Ajouter" />
</form>

<?php 
if (isset($_POST['submit'])) {
  $idProf = $_POST['Professeur'];
  $idSalle = $_POST['Salle'];
  $idMod = $_POST['Module'];
  $mysqltime = date("Y-m-d H:i:s", strtotime($_POST['dateExam']));
  $duration = $_POST['duration'];
  $checkquery = "SELECT * FROM examens WHERE (TIMESTAMPDIFF(MINUTE,testdate,'$mysqltime') <= duration and TIMESTAMPDIFF(MINUTE,'$mysqltime',testdate) <= $duration) and (professeur = $idProf or salle = $idSalle)";
  $checkExamQuery = mysqli_query($conn, $checkquery);
  if(!mysqli_fetch_array($checkExamQuery)){
    $addquery = "INSERT INTO examens(testDate,professeur,module,salle,duration) VALUE ('$mysqltime', $idProf, $idMod, $idSalle, $duration)";
    $createExamQuery = mysqli_query($conn, $addquery);
    header("Location: index.php");
  }
  else
   echo "<script>alert(\"Time Collision Found\")</script>";
  }
 ?>