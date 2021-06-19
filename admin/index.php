<?php
include "../includes/db.php";
include "includes/admin_header.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MainPage</title>
</head>
<body>
	<style>
          .button {
            display: block;
            width: 115px;
            height: 25px;
            background: #303030;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            }
          body, html {
            height: 100%;
            margin: 0;
            font-family: Arial;
          }
          .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
          }
          .tablink:hover {
            background-color: #777;
          }
          .tabcontent {
            color: black;
            display: none;
            padding: 100px 20px;
            height: 100%;
          }
          #Home {background-color: red;}
          #News {background-color: green;}
          #Contact {background-color: blue;}
          #About {background-color: orange;}
          #myTable {
              border-collapse: collapse;
              width: 100%;
              border: 1px solid #ddd;
              font-size: 18px;
            }
            #myTable th, #myTable td {
              text-align: left;
              padding: 12px;
            }
            #myTable tr {
              border-bottom: 1px solid #ddd;
            }
            #myTable tr.header, #myTable tr:hover {
              background-color: #f1f1f1;
            }
		.main{
		   height: 100%;
		   width: auto;
		   left: 160px
		}
		.sidebar {
		  height: 100%;
		  width: 160px;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  padding-top: 16px;
		}
		.sidebar a {
		  padding: 6px 8px 6px 16px;
		  text-decoration: none;
		  font-size: 20px;
		  color: #818181;
		  display: block;
		}
		.sidebar a:hover {
		  color: #f1f1f1;
		}
		.main {
		  margin-left: 160px; 
		  padding: 0px 10px;
		}
		@media screen and (max-height: 450px) {
		  .sidebar {padding-top: 15px;}
		  .sidebar a {font-size: 18px;}
		}
		#myInput {
		  background-image: url('/css/searchicon.png');
		  background-position: 10px 12px; 
		  background-repeat: no-repeat;
		  width: 100%; 
		  font-size: 16px; 
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}
		#myTable {
		  border-collapse: collapse; 
		  width: 100%;
		  left: 160ps;
		  border: 1px solid #ddd;
		  font-size: 18px; 
		}
		#myTable th, #myTable td {
		  text-align: left;
		  padding: 12px;
		}
		#myTable tr {
		  border-bottom: 1px solid #ddd;
		}

		#myTable tr.header, #myTable tr:hover {
		  background-color: #f1f1f1;
		}
	</style>
	<body>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<div class="sidebar">
		  <a href="../Main.php"><i class="fa fa-fw fa-home"></i> Home</a>
		  <a href="../includes/logout.php"><i class="fa fa-fw fa-user"></i>log out</a>
		</div>
		<div class="main">
      
      <h1> Welcome to the Admin page <small><?php echo $_SESSION['adminID'] ?></small></h1>
      <button class="tablink" onclick="openPage('Menu', this)" id="defaultOpen">Examens</button>
      <button class="tablink" onclick="openPage('Salles', this)">Salles</button>
      <button class="tablink" onclick="openPage('Modules', this)" >Modules</button>
      <button class="tablink" onclick="openPage('Professeurs', this)">Professeurs</button>
      
      <div id="Menu" class="tabcontent">
          <h3>Examens</h3>
          <table id="myTable">
            <tr class="header">
              <th style="width:5%;">id</th>
              <th style="width:10%;">Salle</th>
              <th style="width:25%;">Date</th>
              <th style="width:20%;">Module</th>
              <th style="width:20%;">Professeur</th>
              <th style="width:10%;"></th>
              <th style="width:10%;"><a class='button' href='exams.php?add'>Ajouter</a></th>
            </tr>
            <?php
            $query = "SELECT * FROM examens";
            $selectExamQuery = mysqli_query($conn, $query);
            $array = array();
            $i = 0;
            while ($row = mysqli_fetch_assoc($selectExamQuery)) {
              $idExam = $row['examenID'];
              $idProf = $row['professeur'];
              $idMod = $row['module'];
              $idSalle = $row['salle'];
              $dateExam = $row['testdate'];
              $query = "SELECT * FROM professeurs WHERE professeurID = $idProf";
              $selectQuery = mysqli_query($conn, $query);
              $prof = mysqli_fetch_assoc($selectQuery);
          
              $query = "SELECT * FROM modules WHERE moduleID = $idMod";
              $selectQuery = mysqli_query($conn, $query);
              $module = mysqli_fetch_assoc($selectQuery);
          
              $query = "SELECT * FROM salles WHERE salleID = $idSalle";
              $selectQuery = mysqli_query($conn, $query);
              $salle = mysqli_fetch_assoc($selectQuery);
          
              $array[$i] = array();
              $array[$i]['exam'] = $idExam;
              $array[$i]['module'] = $module['moduleName'];
              $array[$i]['prof'] = $prof['professeurName'];
              $array[$i]['salle'] = $salle['salleID'];
              $array[$i]['date'] = $dateExam;
              $i++;
            }
          
            foreach ($array as &$row) {
              echo "<tr>";
              echo "<td>{$row['exam']}</td>";
              echo "<td>{$row['salle']}</td>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['module']}</td>";
              echo "<td>{$row['prof']}</td>";
              echo "<td><a class=\"button\" href='exams.php?del={$row['exam']}'>Supprimer</a></td>";
              echo "<td><a class=\"button\" href='exams.php?edit={$row['exam']}'>Modifier</a></td>";
              echo "</tr>";
            } ?>
			</table>
      </div>


      <div id="Salles" class="tabcontent">
        <h3>Salles</h3>
        <table id="myTable">
          <tr class="header">
            <th style="width:20%;">Nombre de salle</th>
            <th style="width:50%;">Nom de salle</th>
            <th style="width:20%;"></th>
            <th style="width:10%;"><a class='button' href='salles.php?add'>Ajouter</a></th>
          </tr>
          <?php
            $query = "SELECT * FROM salles";
            $selectQueryFromModules = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selectQueryFromModules)) {
              echo "</tr>";
              echo "<td>{$row['salleID']}</td>";
              echo "<td>S{$row['salleID']}</td>";
              echo "<td><a class=\"button\" href='salles.php?del={$row['salleID']}'>Supprimer</a></td>";
              echo "<td><a class=\"button\" href='salles.php?edit={$row['salleID']}'>Modifier</a></td>";
              echo "<tr>";
            }
          ?>
        </table>
      </div>

      <div id="Modules" class="tabcontent">
        <h3>Modules</h3>
        <table id="myTable">
          <tr class="header">
            <th style="width:20%;">Identifiant du Module</th>
            <th style="width:50%;">Nom du Module</th>
            <th style="width:20%;"></th>
            <th style="width:10%;"><a class='button' href='modules.php?add'>Ajouter</a></th>
          </tr>
          <?php
            $query = "SELECT * FROM modules";
            $selectQueryFromModules = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($selectQueryFromModules)) {
              echo "</tr>";
              echo "<td>{$row['moduleID']}</td>";
              echo "<td>{$row['moduleName']}</td>";
              echo "<td><a class=\"button\" href='modules.php?del={$row['moduleID']}'>Supprimer</a></td>";
              echo "<td><a class=\"button\" href='modules.php?edit={$row['moduleID']}'>Modifier</a></td>";
              echo "<tr>";
            }
          ?>
        </table>
      </div>

      <div id="Professeurs" class="tabcontent">
        <h3>Professeurs</h3>
        <table id="myTable">
          <tr class="header">
            <th style="width:10%;">Identifiant</th>
            <th style="width:60%;">nom complet</th>
            <th style="width:20%;"></th>
            <th style="width:10%;"><a class='button' href='professeurs.php?add'>Ajouter</a></th>
          </tr>
          <?php
            $query = "SELECT * FROM professeurs";
            $selectQueryFromProf = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($selectQueryFromProf)) {
              echo "</tr>";
              echo "<td>{$row['professeurID']}</td>";
              echo "<td>{$row['professeurName']}</td>";
              echo "<td><a class=\"button\" href='professeurs.php?del={$row['professeurID']}'>Supprimer</a></td>";
              echo "<td><a class=\"button\" href='professeurs.php?edit={$row['professeurID']}'>Modifier</a></td>";
              echo "<tr>";
            }
          ?>
        </table>
      </div>
    </div>
	<script>
          function openPage(pageName, elmnt) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            document.getElementById(pageName).style.display = "block";
          }
          document.getElementById("defaultOpen").click();
      </script>
  </body>
</body>
</html>
