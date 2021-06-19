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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function ShowModal(){
                document.getElementById("ModalBody").setAttribute("class","modal is-active");
            }
            function HideModal(){
                document.getElementById("ModalBody").setAttribute("class","modal");
            }
        </script>
    </head>
    <body>
        <?php  include ("../Componants/HeaderComponant.php");  ?>
        
        <div class="container">
            <div class="modal" id="ModalBody">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <?php include  $_SERVER['DOCUMENT_ROOT']."/Interface\Bill-Recl-Views\complaint.php";?>
                </div>
                <button class="modal-close"  onclick="HideModal()"></button>
            </div>
        </div>
        <table class="table" style="width:100%;">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><button class="button" id="showModal" onclick="ShowModal()">+</button></th>
                <th scope="col">Subject</th>
                <th scope="col">Body</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($CurrentUser->Complaints() as $data) {
                        echo "<tr>";
                            echo "<th scope='row'>". $data->Id . "</th>";
                            echo "<th>" . $data->Subject . "</th>";
                            echo "<th>" . $data->Content . "</th>";
                            echo "<th>" . ($data->Status? "Solved" : "NotSolved") . "</th>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>


