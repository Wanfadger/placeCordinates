<?php

class Database 
{
    private  const HOST="localhost",USERNAME="root",PASSWORD="",DATABASE_NAME="picme";



    protected function dbConnection(){
        $pdo=null;  
        try{
            $pdo = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE_NAME."",self::USERNAME,self::PASSWORD);
            $db = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
          }
          catch(PDOException $e){
            echo "Database Connection Failed".$e->getMessage();
          }
          return $pdo;
          }
  


          protected function dbDissconnect($pdo){
              $pdo=null;
          }




          



    
}


?>