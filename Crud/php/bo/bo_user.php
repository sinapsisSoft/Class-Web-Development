<?php
#Author: DIEGO CASALLAS
#Date: 08/10/2021
#Description : Is BO User

include_once('../dto/dto_user.php');
include_once('../dao/dao_user.php');
header("Content-type: application/json; charset=utf-8");

class BoUser
{
    private $objUser;
    private $objDao;
    private $intValidate;

    public function __construct()
    {
        $this->objUser = new DtoUser();
        $this->objDao = new DaoUser();
    }

    #Description: Function for create a new user
    public function newUser($id,$name, $email, $state, $telephone)
    {
        try {
            
            $this->objUser->__setUser($id,$name, $email, $state, $telephone);
            $intValidate = $this->objDao->newUser($this->objUser);
       
            
        } catch (Exception $e) {
            echo 'Exception captured: ', $e->getMessage(), "\n";
            $intValidate = 0;
        }
        return $intValidate;
    }
}
$obj = new BoUser();
/// We get the json sent
//$getData = file_get_contents('php://input');
//$data = json_decode($getData);

echo $obj->newUser(0,'Diego','diego3030@gmail.com',1,'234567');

?>