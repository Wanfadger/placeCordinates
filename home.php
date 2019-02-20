<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbEPp5NfezTTwp3cUA3iH2CKlmws7hR6o&libraries=places"></script>

</head>
<body>
      <div id="maindiv">
          <span id="alertMessage"></span>
        <span>Location: </span><input type="text" id="searchString1" placeholder="enter address to search" ><br/><br/>
        <label id="lblresult"></label><br>

        <span>Location: </span><input type="text" id="searchString2" placeholder="enter address to search" ><br/><br/>
        <label id="lblresult"></label><br>

        <span>Location: </span><input type="text" id="searchString3" placeholder="enter address to search" ><br/><br/>
        <label id="lblresult"></label><br>

        <span>Location: </span><input type="text" id="searchString4" placeholder="enter address to search" ><br/><br/>
        <label id="lblresult"></label><br>
        

      </div>
  
    

    <button id="showcords" onclick="getCordinates()" type="button" >show cordinates</button>
    <script src="../placeCordinates/node_modules/jquery/dist/jquery.min.js"> </script>
    <script>
       // jQuery(alert("hello liai"));
        var all=[];
        var filledInputs=0;
            function getCordinates() {
            var address1 = document.getElementById('searchString1').value;
            if(address1 !== ""){
                filledInputs++;
                place1(address1);
            }
            var address2 = document.getElementById('searchString2').value;
            if(address2 !== ""){
                filledInputs++;
                place1(address2);
            }
            var address3 = document.getElementById('searchString3').value;
            if(address3 !== ""){
                filledInputs++;
                place1(address3);
            }
            var address4 = document.getElementById('searchString4').value;
            if(address4 !== ""){
                filledInputs++;
                place1(address4);
            }
    
        function place1(address){
            geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                'address': address
                }, function(results, status) {
    
                   if(status == google.maps.GeocoderStatus.OK){
                   var lat = results[0].geometry.location.lat();
                   var x = lat.toFixed(6);
                   var lng = results[0].geometry.location.lng();
                   var y = lng.toFixed(6);
                   var cordinates=[];
                   var cord = {"name":address,"lat":x,"lng":y};
                
                  pushcords(cord);
                    } else{
                        console.log("error ocurred "+status);
                    }
                });
    
                
               }
    }
    
        function pushcords(places){    
            
            all.push(places)
         if(all.length==filledInputs){
            savePlaceDetails(all);
            resetFields();
         }
    }
    
    function resetFields(){
        all=[];
            filledInputs=0;
            document.getElementById('searchString1').value="";
            document.getElementById('searchString2').value="";
            document.getElementById('searchString3').value="";
            document.getElementById('searchString4').value="";
    }
    //save place details to database via ajax
        function savePlaceDetails(placeDetailsArray){
    
         var placeDetailsString = JSON.stringify(placeDetailsArray);//JSON.stringify(placeDetailsArray);


    $(document).ready(function () {
      var form_data = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../placeCordinates/placesController.php",
          data: {"placeDetails":placeDetailsArray},
          success: function (responseData) {
              console.log(responseData);
              if(responseData==0){
                $("#alertMessage").fadeIn()
                .text("An error occurred, please try again")
                .attr("class" , "alert alert-danger")
                .fadeOut(3000);
            
              }else if(responseData==1){
                  $("#owner_form")[0].reset();
                $("#alertMessage").fadeIn(8000)
                .text(" successfully created")
                .attr("class" , "alert alert-success")
                .fadeOut(7000);
                setTimeout(() => {
                   // window.location.replace("../flexi_audit/login.php");
                }, 6000);
              
            }
    
           }
      }
      );
      
  });    



    }
    
            var source, destination;
            var darection = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
            google.maps.event.addDomListener(window, 'load', function () {
                new google.maps.places.SearchBox(document.getElementById('searchString1'));
                new google.maps.places.SearchBox(document.getElementById('searchString2'));
                new google.maps.places.SearchBox(document.getElementById('searchString3'));
                new google.maps.places.SearchBox(document.getElementById('searchString4'));
            });
    
        </script>
</body>
</html>