
<?php
#Author: DIEGO CASALLAS
#Date: 08/10/2021
#Description : Is DAO User
include_once('../../system/connectionDB.php');
class DaoUser{
   private $objConnection;
   private $arrayResult;
   private $intValidation;

   public function __construct()
   {
       $this->objConnection=new Connection();
       $this->arrayResult=array();
       $this->intValidation=0;
   }
     #Description: Function for create a new User
    public function newUser($objUser){

        try
        {
            $conn=$this->objConnection->connect();
            $conn->query("SET NAMES 'utf8'");

            if($conn!=null){

                $dataUser=$objUser->__getId().",'".$objUser->__getName()."','".$objUser->__getEmail()."','".$objUser->__getPhone()."'";
                //echo "INSERT INTO user(id,name,email,phone) VALUE (".$dataUser.")";
                if($conn->query("INSERT INTO user(id,name,email,phone) VALUE (".$dataUser.")")){
                    $this->intValidation=1;
                }else{
                    $this->intValidation=0; 
                }
                
            }
            $conn->close();
        }
        catch(Exception $ex){
            echo 'Exception captured:',$ex->getMessage(),"\n";
            $this->intValidation=0;

        }
        return $this->intValidation;
    } 
    #Description: Function for Udate  User
    public function updateUser($objUser){

        try
        {
            $conn=$this->objConnection->connect();
            $conn->query("SET NAMES 'utf8'");

            if($conn!=null){

                $dataUser="UPDATE user SET name='".$objUser->__getName()."',email='".$objUser->__getEmail()."',`phone`='".$objUser->__getPhone()."' WHERE id=".$objUser->__getId();
               // echo $dataUser;
                if($conn->query($dataUser)){
                   $this->intValidation=1;
             }else{
                   $this->intValidation=0; 
               }
                
            }
            $conn->close();
        }
        catch(Exception $ex){
            echo 'Exception captured:',$ex->getMessage(),"\n";
            $this->intValidation=0;

        }
        return $this->intValidation;
    } 
     #Description: Function for select a new User

     public function selectUser(){

        try{
            $conn=$this->objConnection->connect();
            $conn->query("SET NAMES 'utf8'");
            if($conn!=null){

                if($result=$conn->query("SELECT * FROM user WHERE 1")){
                    
                    while($row=$result->fetch_array(MYSQLI_ASSOC)){

                        $this->arrayResult[]=$row;
                    }
                    mysqli_free_result($result);
                }  
            }
            $conn->close();
        }
        catch(Exception $ex){
            echo 'Exception captured:',$ex->getMessage(),"\n"; 
        }
        return json_encode($this->arrayResult);
     }
 #Description: Function for select a new User

 public function selectUsers($id){

    try{
        $conn=$this->objConnection->connect();
        $conn->query("SET NAMES 'utf8'");
        if($conn!=null){

            if($result=$conn->query("SELECT * FROM user WHERE id=".$id)){
                
                while($row=$result->fetch_array(MYSQLI_ASSOC)){

                    $this->arrayResult[]=$row;
                }
                mysqli_free_result($result);
            }  
        }
        $conn->close();
    }
    catch(Exception $ex){
        echo 'Exception captured:',$ex->getMessage(),"\n"; 
    }
    return json_encode($this->arrayResult);
 }
      #Description: Function for Delete  User
    public function deleteUser($objUser){

        try
        {
            $conn=$this->objConnection->connect();
            $conn->query("SET NAMES 'utf8'");

            if($conn!=null){

                $dataUser="DELETE FROM user WHERE id=".$objUser->__getId();
               // echo $dataUser;
             if($conn->query($dataUser)){
                   $this->intValidation=1;
             }else{
                   $this->intValidation=0; 
               }
                
            }
            $conn->close();
        }
        catch(Exception $ex){
            echo 'Exception captured:',$ex->getMessage(),"\n";
            $this->intValidation=0;

        }
        return $this->intValidation;
    } 

}

?>