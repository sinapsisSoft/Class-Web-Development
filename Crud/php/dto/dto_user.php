<?php
#Author: DIEGO CASALLAS
#Date: 08/10/2021
#Description : Is DTO User
class DtoUser
{
    private $User_id;
    private $User_name;
    private $User_email;
    private $Stat_id;
    private $User_telephone;


    public function __construct()
    {

    }
    public function __setUser($id,$name, $email, $state, $telephone)
    {
        $this->User_name = $name;
        $this->User_email = $email;
        $this->Stat_id = $state;
        $this->User_telephone = $telephone;
        $this->User_id = $id;
    }

    public function __getUser()
    {
        $objUser = new DtoUser();
        $objUser->__getId();
        $objUser->__getName();
        $objUser->__getEmail();
        $objUser->__getStat_id();
        $objUser->__getTelephone();
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
    
    public function __setStat_id($stat_id)
    {
        $this->Stat_id = $stat_id;
    }
    
    public function __setTelephone($telephone)
    {
        $this->User_telephone = $telephone;
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
   
    public function __getStat_id()
    {
        return $this->Stat_id;
    }
    

    public function __getTelephone()
    {
        return $this->User_telephone;
    }
  
}

?>