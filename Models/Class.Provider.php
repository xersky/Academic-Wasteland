<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Models/Class.Client.php';
    class Provider
    {
        public $Id = -1;
        public $FullName = '';

        public function __construct($providerColumn) {
            $this->Id       =  $providerColumn["id"];
            $this->FullName =  $providerColumn["fullname"];
        }
        
        public function Custumers($condition = null){
            $conn = connect();
            if($condition){
                $res = getRequest($conn,"Select * From Clients;");
            } else {
                $res = getRequest($conn,"Select * From Clients" . $condition . ";");
            }
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
