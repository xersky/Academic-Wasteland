  <?php
  if (isset($_GET['edit'])) {
    $idExam = $_GET['edit'];
  ?>
    <form action="" method="post">
      <label for="Module">Modifier Exam</label>

      <?php
      $query = "SELECT * FROM examens WHERE examenID = $idExam";
      $selectExamId = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($selectExamId)) {
        $id_exam = $row['examenID'];
        $id_prof = $row['professeur'];
        $id_mod = $row['module'];
        $id_salle = $row['salle'];
        $date_exam = $row['testdate'];
        $timespan = $row['duration'];
      ?>
        <select name="modifier_Module">
          <?php
          $query = "SELECT * FROM modules";
          $queryMod = mysqli_query($conn, $query);
          while ($rows = mysqli_fetch_assoc($queryMod)) {
            $idMod = $rows['moduleID'];
            $nomMod = $rows['moduleName'];
            if (isset($id_mod) && $idMod == $id_mod) {
              echo "<option value='$idMod' selected>$nomMod</option>";
            } else {
              echo "<option value='$idMod'>$nomMod</option>";
            }
          }
          ?>
        </select>

        <select name="modifier_Salle">
          <?php
          $query = "SELECT * FROM salles";
          $querySalle = mysqli_query($conn, $query);
          while ($rows = mysqli_fetch_assoc($querySalle)) {
            $idSalle = $rows['salleID'];
            if (isset($id_prof) && $idSalle == $id_salle) {
              echo "<option value='$idSalle' selected>$idSalle</option>";
            } else {
              echo "<option value='$idSalle'>$idSalle</option>";
            }
          }
          ?>
        </select>

        <select name="modifier_Professeur">
          <?php
          $query = "SELECT * FROM professeurs";
          $queryProf = mysqli_query($conn, $query);
          while ($rows = mysqli_fetch_assoc($queryProf)) {
            $idProf = $rows['professeurID'];
            $nomProf = $rows['professeurName'];
            if (isset($id_prof) && $id_prof == $idProf) {
              echo "<option value='$idProf' selected>$nomProf</option>";
            } else {
              echo "<option value='$idProf'>$nomProf</option>";
            }
          }
          ?>
        </select>
    <?php }
    } ?>
    <input type="datetime-local" value="<?php echo "$modifier_dateExam" ?>" class="date" name="modifier_dateExam" REQUIRED />
    <input type="range" min="0" max="523" id="mins" class="duration" name="duration" step="1" oninput="this.form.amountInput.value=this.value">
    <input type="number" name="amountInput" min="0" class="duration" max="523" value="<?php echo "$timespan"?>" oninput="this.form.duration.value=this.value" />
    <input class="btn btn-primary" type="submit" name="modify_Exam" value="Modifier" />
    </form>

    <?php
    if (isset($_POST['modify_Exam'])) {

      $id_mod = $_POST['modifier_Module'];
      $id_sal = $_POST['modifier_Salle'];
      $id_prof = $_POST['modifier_Professeur'];
      $date_examMod = date("Y-m-d H:i:s", strtotime($_POST['modifier_dateExam']));
      $duration = $_POST['duration'];
      $checkquery = "SELECT * FROM examens WHERE (TIMESTAMPDIFF(MINUTE,testdate,'$date_examMod') <= duration and TIMESTAMPDIFF(MINUTE,'$date_examMod',testdate) <= $duration) and (professeur = $id_prof or salle = $id_sal)";
      $checkExamQuery = mysqli_query($conn, $checkquery);
      if(!mysqli_fetch_array($checkExamQuery)){
        $query = "UPDATE examens SET testDate = '{$date_examMod}', module = '{$id_mod}', salle = '{$id_sal}', professeur = '{$id_prof}' WHERE examenID = $idExam";
        $updateQuery = mysqli_query($conn, $query);
        header("Location: index.php");
      }
      else{
       echo "<script>alert(\"Time Collision Found\")</script>";
      }
    }
    ?>