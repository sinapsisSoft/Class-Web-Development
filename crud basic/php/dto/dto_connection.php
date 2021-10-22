<?php
#Author: DIEGO  CASALLAS
#Date: 08/10/2021
#Description : Is class connection
class DtoConnection{

    private $user;
    private $password;
    private $server;
    private $database;

    function __construct()
    {
        $this->user="root";
        $this->password="";
        $this->server="localhost";
        $this->database="inventory";
    }

    public function getData(){

        return array($this->server,$this->user,$this->password,$this->database);
    }
}

?>