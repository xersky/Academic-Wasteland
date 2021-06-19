<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "exammap";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn == false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
