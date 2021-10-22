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
    public function newUser($id, $name, $email, $phone)
    {
        try {
            $this->objUser->__setUser($id, $name, $email, $phone);
            $intValidate = $this->objDao->newUser($this->objUser);
        } catch (Exception $ex) {
            echo 'Exception captured:', $ex->getMessage(), "\n";
            $intValidate = 0;
        }

        return $intValidate;
    }

    #Description: Function for update  user
    public function updateUser($id, $name, $email, $phone)
    {
        try {
            $this->objUser->__setUser($id, $name, $email, $phone);
            $intValidate = $this->objDao->updateUser($this->objUser);
        } catch (Exception $ex) {
            echo 'Exception captured:', $ex->getMessage(), "\n";
            $intValidate = 0;
        }

        return $intValidate;
    }
    #Description: Function for update  user
    public function deleteUser($id)
    {
        try {
            $this->objUser->__setId($id);
            $intValidate = $this->objDao->deleteUser($this->objUser);
        } catch (Exception $ex) {
            echo 'Exception captured:', $ex->getMessage(), "\n";
            $intValidate = 0;
        }

        return $intValidate;
    }
    #Description: Function for Select user
    public function selectUser()
    {
        try {
            $args = func_get_args();
            $numoArgs = count($args);
            if ($numoArgs == 0) {
                echo $this->objDao->selectUser();
            } else {
                echo $this->objDao->selectUsers($args[0]);
            }
        } catch (Exception $ex) {
            echo 'Exception captured:', $ex->getMessage(), "\n";
        }
    }
}

#############Get data Ajax 

$obj = new BoUser();
$getData = file_get_contents('php://input');
$data = json_decode($getData);

if (isset($data->POST)) {

    if ($data->POST == "POST") {
        echo $obj->newUser($data->id, $data->name, $data->email, $data->phone);
    }

    if ($data->POST == "DELElTE") {
        echo $obj->deleteUser($data->id);
    }
    if ($data->POST == "PUT") {
        echo $obj->updateUser($data->id, $data->name, $data->email, $data->phone);
    }
}
if (isset($data->GET)) {
    if ($data->GET == "GET") {
        echo $obj->selectUser();
    }
    if ($data->GET == "LIST_USER") {
        echo $obj->selectUser($data->id);
    }
}

/********** PUT ************/
if (isset($data->PUT)) {
    if ($data->POST == "PUT") {
        //echo $obj->updateUser($data->id, $data->name, $data->email, $data->phone);
    }
}
