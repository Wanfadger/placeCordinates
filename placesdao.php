<?php
require_once(realpath( dirname( __FILE__ ) )."./DatabaseConnection.php");
require_once(realpath( dirname( __FILE__ ) )."./placeModel.php");

class PlacesDao extends Database
{
    private  const DB_TABLE = "location";

    public static function savePlaceCordinates(PlaceCordinates $placeCordinate){
    $conn = Database::dbConnection();
       // foreach ($placeCordinates as $placeCordinate) {
            $sqlString = "INSERT INTO ".self::DB_TABLE."(Nameofplace , longitude , latitude) VALUES(:placename , :lat , :lng)";
            $stmt = $conn->prepare($sqlString);
            $stmt->bindValue(":placename" , $placeCordinate->getLocation());
            $stmt->bindValue(":lat" , $placeCordinate->getLat());
            $stmt->bindValue(":lng" , $placeCordinate->getLng());
            if($stmt->execute()){
                echo 1;
            }else{
                echo 0;
            }
            echo $placeCordinate->getLocation()."\n";
        }
    //}
}



// PlacesDao::savePlaceCordinates(array($placeCord1 , $placeCord2 , $placeCord3 , $placeCord4));

// // $placeCord->setLat(0.434353);
// $placeCord->setLng(0.12345);





?>