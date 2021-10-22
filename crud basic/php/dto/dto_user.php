<?php
#Author: DIEGO CASALLAS
#Date: 08/10/2021
#Description : Is DTO User
class DtoUser{

    private $User_id;
    private $User_name;
    private $User_email;
    private $User_phone;

    public function __construct()
    {
        
    }

    public function __setUser($id,$name,$email,$phone){

        $this->User_id=$id;
        $this->User_name=$name;
        $this->User_email=$email;
        $this->User_phone=$phone;

    }

    public function __getUser(){

        $objUser=new DtoUser();
        $objUser->__getId();
        $objUser->__getName();
        $objUser->__getEmail();
        $objUser->__getPhone();

        return $objUser;

    }

    //SET User
    public function __setId($id)
    {
        $this->User_id = $id;
    }
    public function __setName($name)
    {
        $this->User_name = $name;
    }
    public function __setEmail($email)
    {
        $this->User_email = $email;
    }
    
    public function __setTelephone($telephone)
    {
        $this->User_phone = $telephone;
    }
    
    //GET User
   
    public function __getId()
    {
        return $this->User_id ;
    }
    public function __getName()
    {
        return $this->User_name ;
    }
    public function __getEmail()
    {
        return $this->User_email ;
    }
    public function __getPhone()
    {
        return $this->User_phone ;
    }
  
    

}

?>