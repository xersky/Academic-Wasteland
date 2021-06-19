<?php
        include $_SERVER['DOCUMENT_ROOT'].'/Server/DataBaseApi.php';
        require $_SERVER['DOCUMENT_ROOT']."/Models/SubModels/Class.Reclamation.php" ;
        
        $dbh = connect();

        if(isset($_POST['Send'])
            && !empty($_POST['subject'])
            && !empty($_POST['provider'])
            && !empty($_POST['content'])) { 
             
            $Complaint = new Reclamation($_POST);
            $CurrentUser = unserialize($_SESSION["current"]);

            $query = "INSERT INTO Reclamation
                        (id_client, id_fournisseur, subject, content, status) 
                      VALUES  
                        (" .    $CurrentUser->Id.
                        ", " .  $Complaint->To .
                        ", '" . $Complaint->Subject . "' " .
                        ", '" . $Complaint->Content. "' " . 
                        ", FALSE);";
            if($prodMod)
                putRequest($dbh, $query);    
            }
            header("location:..\Interface\Client\Pages\Complaints.php");
        
    ?>