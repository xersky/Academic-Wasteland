<?php
    session_start();
    ob_start();

    require $_SERVER['DOCUMENT_ROOT']."/Models/Class.User.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Class.Provider.php" ;

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $conn = connect();
        $res = getBy("Users", $conn, array( "username" => $_POST['username'], 
                                            "password" => $_POST['password'])
                    ,1);
        
        if ($res != null) {             
            $SerializedUser = serialize(new User($res['id'], $res['username'], $res['role']));
            $user = new User($res['id'], $res['username'], $res['role']);
            $_SESSION["user"]   = $user;
            if ($user->Role == "client") {
                $_SESSION["current"] = serialize(new Client(getBy("Clients" , $conn,  array( "id_user" => $res['id']), 1)));
                header("Location:../Interface/Client/ClientSpace.php");
            } else if ($user->Role == "provider") {
                $_SESSION["current"] = serialize(new Provider(getBy("Providers" , $conn, array( "id_user" => $res['id']), 1)));
                header("Location:../Interface/Provider/ProviderSpace.php");
            }
            
        } else {
            echo "<script>
                    alert('query failed please try again')
                  </script>";
        }
    }
    //header("Location:../Interface/Index/Index.php");
?>
