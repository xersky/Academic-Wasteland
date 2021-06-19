<?php
class Facture
{
    public $Id = -1;
    public $Consomation = 0.0;
    public $Month = null;
    public $IsPaid = false;
    private $Tva = 1.14;

    public function __construct($reclamationColumn) {
        $this->Id          =  $reclamationColumn["id"];
        $this->Consomation =  $reclamationColumn["consomation"];
        $this->Month       =  $reclamationColumn["month"];
        $this->IsPaid      =  $reclamationColumn["paid"];
    }

    public function Amount(){
        if($this->Consomation<=100){
            return ($this->Consomation * 0.91);
        }
        if($this->Consomation<200){
            return ($this->Consomation * 1.01);
        }
        return ($this->Consomation * 1.12);
    } 

    public function Price(){
        return ($this->Amount() * $this->Tva);
    }
}
?>
