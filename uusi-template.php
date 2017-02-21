<?php /* Template Name: uusi-template */ ?>
<?php get_header(); ?>
<div class="content-row">
<body>
    <div id="map"></div>
    <div id="form">
      <table>
      <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
      <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
          <tr><td>Type:</td> <td><select id='type'> +
                 <option value='bar' SELECTED>bar</option>
                 <option value='restaurant'>restaurant</option>
                 </select> </td></tr>
 <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>

    </div>
    <div id="message">Location saved</div>


   
    <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;
        
        //näyttää kartan sivulla
      function initMap() {
        var suomi = {lat: 60.8215965, lng: 24.9911299};
        map = new google.maps.Map(document.getElementById('map'), {
          center: suomi,
          zoom: 13
        });
          //tekee infosivun johon hakee formin näytettäväksi
           infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        })

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });
          //mahdollistaa klikkauksen merkin kartalle
        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });

            //avaa infoikkunan kun klikkaa
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      }
function saveData() {
        var name = escape(document.getElementById('name').value);
        var address = escape(document.getElementById('address').value);
        var type = document.getElementById('type').value;
        var latlng = marker.getPosition();
           $.get('merkkiupload.php',{lat:latlng.lat(),lng:latlng.lng(),name:name,adress:address, type:type})
     .done(function(data){  
      alert("Data Loaded: " + data);
     });
    };

    </script>
    
    <?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM&callback=initMap"
    async defer></script>
        
</body>



    

<?php get_footer();?>