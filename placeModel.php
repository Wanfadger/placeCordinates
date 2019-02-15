<?php

    class PlaceCordinates
    {
        $location;
        $lat;
        $lng;


        /**
         * Get the value of location
         */ 
        public function getLocation()
        {
                return $this->location;
        }

        public function setLocation($location)
        {
                $this->location = $location;

                return $this;
        }


        /**
         * Get the value of lng
         */ 
        public function getLng()
        {
                return $this->lng;
        }

        public function setLng($lng)
        {
                $this->lng = $lng;

                return $this;
        }

        /**
         * Get the value of lat
         */ 
        public function getLat()
        {
                return $this->lat;
        }

      
        public function setLat($lat)
        {
                $this->lat = $lat;

                return $this;
        }
    }
    
?>