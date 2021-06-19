<?php
class User
{
    public $Id = -1;
    public $UserName = '';
    public $Role = 'None';

    public function __construct(int $id,string $name,string $role) {
        $this->Id = $id;
        $this->UserName = $name;
        $this->Role = $role;
    }
}
?>