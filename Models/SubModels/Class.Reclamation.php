<?php
class Reclamation
{
    public $Id = -1;
    public $Subject = "";
    public $Content = '';
    public $By = '';
    public $To = '';
    public $Status = false;

    public function __construct($reclamationColumn) {
        $this->Id       =  $reclamationColumn["id"];
        $this->Subject  =  $reclamationColumn["subject"];
        $this->Content  =  $reclamationColumn["content"];
        $this->By       =  $reclamationColumn["id_client"];
        $this->To  =  $reclamationColumn["id_fournisseur"];
        $this->Status   =  $reclamationColumn["status"];
    }
}
?>
