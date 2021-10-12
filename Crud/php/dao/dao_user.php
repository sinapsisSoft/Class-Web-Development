<?php
#Author: DIEGO CASALLAS
#Date: 08/10/2021
#Description : Is DAO User
include_once('../../system/connectionDB.php');
class DaoUser
{
    private $objConntion;
    private $arrayResult;
    private $intValidatio;

    public function __construct()
    {
        $this->objConntion = new Connection();
        $this->arrayResult = array();
        $this->intValidatio;
    }
     #Description: Function for create a new Client
     public function newUser($objUser)
     {
         try {
             $con = $this->objConntion->connect();
             $con->query("SET NAMES 'utf8'");

             if ($con != null) {
                 $dataUser = $objUser->__getId().",'" . $objUser->__getName() . "','" . $objUser->__getEmail() . "','" . $objUser->__getTelephone()."'";
                  echo $dataUser;
                 if ($con->query("INSERT INTO user(id, name, email, phone) VALUES(" . $dataUser . ")")) {
                     $this->intValidatio = 1;
                 } else {
                     $this->intValidatio = 0;
                 }
             }
             $con->close();
         } catch (Exception $e) {
             echo 'Exception captured: ', $e->getMessage(), "\n";
             $this->intValidatio = 0;
         }
         return $this->intValidatio;
     }



}

?>