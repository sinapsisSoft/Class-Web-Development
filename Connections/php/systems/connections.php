<?php
    class Connection{

        private $mysql;
        private $user;
        private $password;
        private $db;
        private $server;

        public function __construct()
        {
            $this->mysql=null;
            $this->user="root";
            $this->password="";
            $this->db="inventory";
            $this->server="localhost";
        }

        public function connect(){

            try{
                $this->mysql=new mysqli($this->server,$this->user,$this->password,$this->db);

                //echo"Connected";
            }
            catch(Exception $e){
                die("Error occured;".$e->getMessage()); 

            }

            return  $this->mysql;
        }

    }


?>