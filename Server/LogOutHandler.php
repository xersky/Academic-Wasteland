<?php
session_start();
    unset($_SESSION["current"]);
    header("Location:../Interface/Index/Index.php");
?>
