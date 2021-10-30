<?php   

include_once(__DIR__.'/../systems/connections.php');

class Users{

    private $conn;
    private $objConnections;
    private $arrayResult;
    private $sqlQuery;

    public function __construct()
    {
        $this->objConnections=new Connection(); 
        $this->arrayResult=array();
      
    }

    public function selectUser(){

        try{
            $conn=$this->objConnections->connect();
            $sqlQuery="SELECT * FROM `user` WHERE 1";
            if($conn!=null){

                if($result=$conn->query($sqlQuery)){

                    while($row=$result->fetch_array(MYSQLI_ASSOC)){
                        $this->arrayResult[]=$row;
                    }

                    mysqli_free_result($result);
                }

            }
            $conn->close();

        }
        catch(Exception $e){

            echo"Exception capture:",$e->getMessage();
        }
        return $this->arrayResult;
    }
}



?>