<?php
        session_start();
        require $_SERVER['DOCUMENT_ROOT']."/Models/Class.Client.php" ;
        $CurrentUser = unserialize($_SESSION["current"]);
?>
<html>
    <head> 
        <title> Acceuil </title>
        <script type='text/javascript' src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
    </head>
    <body>
        <?php  include ("../Componants/HeaderComponant.php");  ?>
        <?php  include ("../Componants/Dashboard.php");  ?>
    </body>
</html>
