
<?php
require_once(realpath( dirname( __FILE__ ) )."./placeModel.php");
require_once(realpath( dirname( __FILE__ ) )."./placesdao.php");
$placeCord1 = new PlaceCordinates();
$placeCord1->setLocation("kampala");
$placeCord1->setLng(0.123456);
$placeCord1->setLat(0.233445);

$placeCord2 = new PlaceCordinates();
$placeCord2->setLocation("kala");
$placeCord2->setLng(0.1234356);
$placeCord2->setLat(0.233435);

$placeCord3 = new PlaceCordinates();
$placeCord3->setLocation("kampa");
$placeCord3->setLng(0.123496);
$placeCord3->setLat(0.2334315);

$placeCord4 = new PlaceCordinates();
$placeCord4->setLocation("kampala");
$placeCord4->setLng(0.1234567);
$placeCord4->setLat(0.233405);

PlacesDao::savePlaceCordinates(array($placeCord1 , $placeCord2 , $placeCord3 , $placeCord4));


?>