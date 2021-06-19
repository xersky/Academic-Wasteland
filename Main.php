<?php
include "includes/db.php";
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MainPage</title>
</head>
<body>
	<style>
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
	<script>
		function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
		}
	</script>
	<header align="Center" id="Title">
		Page Principale
	</header>
	<body >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<div class="sidebar">
		  <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
			<?php
			if (isset($_SESSION['adminRole'])) {
				echo "<a href=\".\admin\index.php\"><i class=\"fa fa-fw fa-wrench\"></i> gestion</a>";
				echo "<a href=\".\includes\logout.php\"><i class=\"fa fa-fw fa-user\"></i> log out</a>";
			}else{
				echo "<a href=\"adLogin.php\"><i class=\"fa fa-fw fa-user\"></i> log in</a>";
			}
			?>
		 
		</div>
		<div class="main">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
			<table id="myTable">
			  <tr class="header">
				<th style="width:10%;">id</th>
				<th style="width:10%;">Salle</th>
				<th style="width:20%;">Date</th>
				<th style="width:20%;">Module</th>
				<th style="width:30%;">Professeur</th>
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
					echo "</tr>";
				} ?>
			</table>
		</div>
	</body>
</body>
</html>
