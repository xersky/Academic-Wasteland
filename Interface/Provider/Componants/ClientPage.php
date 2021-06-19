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
        <script>
            function ShowModal(mode, jsn){
                if(mode==0){
                    document.getElementById("editPart").style.visibility  = "hidden";
                    document.getElementById("editPart").style.height  = 0;
                    document.getElementById("addPart").style.visibility  = "visible";
                    document.getElementById("addPart").style.height  = 50;

                    document.getElementById("name").placeholder  = "Full Name";
                    document.getElementById("cin").placeholder  = "Cin";
                    document.getElementById("phone").placeholder  = "TelePhone";
                    document.getElementById("adress").placeholder  = "Address";
                    document.getElementById("email").placeholder  = "Email";

                    document.getElementById("name").value  = null;
                    document.getElementById("cin").value  = null;
                    document.getElementById("phone").value  = null;
                    document.getElementById("adress").value  = null;
                    document.getElementById("email").value  = null;
                } else {
                    document.getElementById("editPart").style.visibility  = "visible";
                    document.getElementById("editPart").style.height  = 25;
                    document.getElementById("addPart").style.visibility  = "hidden";
                    document.getElementById("addPart").style.height  = 0;
                    //fill textboxes
                    document.getElementById("name").placeholder  = jsn.FullName;
                    document.getElementById("cin").placeholder  = jsn.Cin;
                    document.getElementById("phone").placeholder  = jsn.Phone;
                    document.getElementById("adress").placeholder  = jsn.Adress;
                    document.getElementById("email").placeholder  = jsn.Email;

                    document.getElementById("name").value  = jsn.FullName;
                    document.getElementById("cin").value  = jsn.Cin;
                    document.getElementById("phone").value  = jsn.Phone;
                    document.getElementById("adress").value  = jsn.Adress;
                    document.getElementById("email").value  = jsn.Email;

                }
                document.getElementById("ModalBody").setAttribute("class","modal is-active");
            }
            function HideModal(){
                document.getElementById("ModalBody").setAttribute("class","modal");
            }
        </script>
    </head>
    <body>
        <?php  include ("./SubComponants/HeaderComponant.php");  ?>
        
        <div class="container">
            <div class="modal" id="ModalBody">
                <div class="modal-background" style="opacity=0.25;"></div>
                <div class="modal-content">
                    <?php include  $_SERVER['DOCUMENT_ROOT']."/Interface\Provider\Componants\SubComponants\AddClient.php";?>
                </div>
            </div>
        </div>
        <table class="table" style="width:100%;">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><button class="button" id="showModal0" onclick="ShowModal(0)">+</button></th>
                <th scope="col">FullName</th>
                <th scope="col">Cin</th>
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Reclamations</th>
                <th scope="col">Bills</th>
                <th scope="col">Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($CurrentUser->Custumers() as $data) {
                        $clientData = json_encode($data);
                        $clientBills = json_encode($data->Bills());
                        $clientComplaints = json_encode($data->Complaints());
                        echo "<tr>";
                            echo "<th scope='row'>". $data->Id . "</th>";
                            echo "<th>" . $data->FullName . "</th>";
                            echo "<th>" . $data->Cin . "</th>";
                            echo "<th>" . $data->Adress . "</th>";
                            echo "<th>" . $data->Phone . "</th>";
                            echo "<th>" . $data->Email . "</th>";
                            echo "<th><button class='button' onclick='FacShowModal(".$clientBills.")'>" . "Bills" . "</button></th>";
                            echo "<th><button class='button' onclick='RecShowModal(".$clientComplaints.")'>" . "Complaints" . "</button></th>";
                            echo "<th><button class='button' id='showModal1' onclick='ShowModal(1,".$clientData.")'>+</button></th>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>


