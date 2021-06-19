<?php
    function connect($SetDebug = false) {
        if($SetDebug==false){
            $host = "localhost";
            $dbname = "billingDb";
            $user = "CykaBlyat";
            $pass = "password";

            try {
                $dbh = new PDO(
                    "mysql:host=$host;dbname=$dbname",
                    $user,
                    $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $dbh;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return array(
            "Users" => array(
                array(
                    'id' => "0",
                    "username" => "root",
                    "role" => "provider",
                    "password"=> "toor"
                ),
                array(
                    'id' => "1",
                    "username" => "JohnDoe",
                    "role" => "client",
                    "password"=> "password"
                ),
                array(
                    'id' => "2",
                    "username" => "JaneDoe",
                    "role" => "client",
                    "password"=> "password"
                ),
                array(
                    'id' => "3",
                    "username" => "AymanBouchareb",
                    "role" => "Provider",
                    "password"=> "password"
                )
            ),
            "Clients" => array(
                array(
                    "id" => "123456",
                    "id_user" => "1",
                    "fullname" => "John Doe",
                    "cin" => "A12345",
                    "telephone" => "0612345678",
                    "email" => "john@doe.com",
                ),
                array(
                    "id" => "123456",
                    "id_user" => "2",
                    "fullname" => "Jane Doe",
                    "cin" => "A12345",
                    "telephone" => "0612345678",
                    "email" => "john@doe.com",
                ),
            ),
            
            "Providers" => array(
                array(
                    "id" => "123456",
                    "id_user" => "3",
                    "fullname" => "Ayman Bouchareb",
                ),
                array(
                    "id" => "123456",
                    "id_user" => "0",
                    "fullname" => "root",
                ),
            ),
        );;
    }

    function getBy ($table, $conn, $conds, $idx, $SetDebug = false) {
        if($SetDebug == false){
            $condStr = array_reduce($conds, function ($acc, $itm) use(&$conds){
                return $acc ." and ". key($conds) . " = " . $itm;
            },"");
            $id = fetchData($conn, "SELECT * role FROM " . $table . " WHERE " . $condStr . " true;");
            return $id[$idx-1];
        } else {
            $res = array_filter($conn[$table],function ($item) use(&$conds){
                $valid = true;
                foreach ($conds as $key => $value) {
                    $valid = $valid && ($item[$key]==$value);
                }
                return $valid;
            });
            var_dump($res);
            return array_values($res)[$idx - 1];
        }   
    }

    function setBy ($table, $conn, $Attrs) {
        $id = fetchData($conn, "SELECT * role FROM " . $table . " WHERE " . $condAttr . "=" . $condVal . ";");
        return $id[$idx][$attr];   
    }
    
    function getRequest($dbh, $statement) {
        if ($dbh) {
            $query = $dbh->prepare($statement);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function putRequest($dbh, $statement) {
        if ($dbh) {
            $dbh->exec($statement); 
        }
    }

?>