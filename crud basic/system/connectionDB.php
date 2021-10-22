<?php
#Author: DIEGO  CASALLAS
#Date: 08/10/2021
#Description : Is class connection
include("../../php/dto/dto_connection.php");

class Connection{
    private $mysql;
    private $objDto;

    public function connect(){
        try{
            $objDto=new DtoConnection();
            $dataDB=$objDto->getData();
            $mysql=new mysqli($dataDB[0],$dataDB[1],$dataDB[2],$dataDB[3]);
            //echo "Connected";

        }
        catch(PDOException $e){
            die("Error occurred;".$e->getMessage());

        }

        return $mysql;

    }

}

?>