<?php
    include $_SERVER['DOCUMENT_ROOT']."/Server/DataBaseApi.php";
    require $_SERVER['DOCUMENT_ROOT'].'/Models/SubModels/Class.Facture.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Models/SubModels/Class.Reclamation.php';
    class Client
    {
        public $Id = -1;
        public $FullName = '';
        public $Cin = '';
        public $Adress = '';
        public $Phone = 212612345678;
        public $Email = '';
        public $UserRef = null;

        public function __construct($clientColumn) {
            $this->UserRef  =  $clientColumn["id_user"];
            $this->Id       =  $clientColumn["id"];
            $this->FullName =  $clientColumn["fullname"];
            $this->Cin      =  $clientColumn["cin"];
            $this->Adress   =  $clientColumn["adress"];
            $this->Phone    =  $clientColumn["telephone"];
            $this->Email    =  $clientColumn["email"];
        }

        public function Complaints($condition = null){
            $conn = connect();
                if($condition){
                    $res = getRequest($conn,"Select id, subject, content, status From Reclamations;");
                } else {
                    $res = getRequest($conn,"Select id, subject, content, status From Reclamations" . $condition . ";");
                }
                return array_map(
                    function($obj){ 
                        return new Reclamation($obj); 
                    }, $res);
        } 

        public function Bills($condition = null){
            $conn = connect();
                if($condition){
                    $res = getRequest($conn,"Select id, consomation, month, paid From Factures;");
                } else {
                    $res = getRequest($conn,"Select id, consomation, month, paid From Factures" . $condition . ";");
                }
                return array_map(
                    function($obj){ 
                        return new Facture($obj); 
                    }, $res);
        } 
    }
?>
