<?php
        require $_SERVER['DOCUMENT_ROOT']."/Models/Class.Client.php" ;
        $dbh = connect();
        $Client = new Client($_POST);
        $User = new Client(-1, $Client->FullName, $Client->Cin);
        if(isset($_POST['post'])) { 
            putRequest($dbh, '  INSERT INTO Users (username, password, role) 
                                VALUES ("' . $User->UserName . '", "' . $User->Cin . '", client);');
            
            $UserId = getRequest($dbh, 'SELECT LAST_INSERT_ID();')[0]['LAST_INSERT_ID()'];

            putRequest($dbh, '  INSERT INTO Clients (id_user, fullname, cin, adress, email, telephone)
                                VALUES (' . $UserId . ', "' . $Client->FullName . '", "' . $User->Cin . '", ' .  $User->Adress . ', "' .  $User->Email.", " . $User->Phone . '");');
        } else if(isset($_POST['put'])) { 
            putRequest($dbh, "UPDATE Clients SET    fullname=".$Client->FullName.", 
                                                    cin=".$Client->Cin.", 
                                                    adress=".$Client->Adress.", 
                                                    email=".$Client->Email.", 
                                                    telephone=".$Client->Phone.")
                              WHERE id=" . $Client->Id . "");
        } else if(isset($_POST['del'])) { 
            putRequest($dbh,"DELETE FROM Factures WHERE id_client=" . $Client->Id . ";".
                            "DELETE FROM Reclamation WHERE id_client=" . $Client->Id . " ;".
                            "DELETE FROM Users WHERE id=" . $Client->UserRef . " ;".
                            "DELETE FROM Clients WHERE id=" . $Client->Id . ";");
        }
        header("location:../Interface/Provider/Componants/ClientPage.php");
    ?>