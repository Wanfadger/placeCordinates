
<?php
require_once(realpath( dirname( __FILE__ ) )."./placeModel.php");
require_once(realpath( dirname( __FILE__ ) )."./placesdao.php");

 if(isset($_POST['placeDetails'])){
    $placeArray = $_POST['placeDetails'];
   foreach ($placeArray as $key => $place) {
        $placeCord = new PlaceCordinates();
        $placeCord->setLocation($place["name"]);
        $placeCord->setLng($place["lat"]);
        $placeCord->setLat($place["lng"]);
        PlacesDao::savePlaceCordinates($placeCord);
    }

 }else{
     echo "no place recieved";
 }


// $placeCord1 = new PlaceCordinates();
// $placeCord1->setLocation("kampala");
// $placeCord1->setLng(0.123456);
// $placeCord1->setLat(0.233445);



//PlacesDao::savePlaceCordinates(array($placeCord1);


?>