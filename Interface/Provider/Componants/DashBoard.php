<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/Models/Class.Provider.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Server/Utils.php" ;
    $CurrentUser = unserialize($_SESSION["current"]);
?>
<html>
    <head> 
        <title> Acceuil </title>
        <script type='text/javascript' src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://bootstrapstudio.io/demo//embed//bootstrap/4/default/bootstrap.min.css">
        <link rel="stylesheet" href="https://bootstrapstudio.io/demo//embed/animation/animate.min.css" bs-system-element="" bs-hidden="">
        <link rel="stylesheet" href="https://bootstrapstudio.io/demo//embed/animation/aos.min.css" bs-system-element="" bs-hidden="">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/font-awesome.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/ionicons.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/line-awesome.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/material-icons.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/simple-line-icons.min.css">
        <link rel="stylesheet" bs-hidden="1" bs-system-element="1" href="https://bootstrapstudio.io/demo//embed/fonts/typicons.min.css">
        <link rel="stylesheet" href="https://bootstrapstudio.io/demo//embed/fonts/fontawesome5-overrides.min.css" bs-system-element="" bs-hidden="">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    </head>
    <body>
        <?php  include ("./SubComponants/HeaderComponant.php");  ?>
        <?php  include ("./SubComponants/DashboardComp.php");  ?>
    </body>
</html>