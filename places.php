<?php
include_once("../placeCordinates/placeModel.php");

$place = new PlaceCordinates();
$place->setLat(0.324141515);
$place->setLng(0.6354672);
$place->setLocation("kabowa");

echo "lat ".$place->getLat()." lng ".$place->getLng()." location ". $place->getLocation();

?>