<?php /* Template Name: uusi-template */ ?>
<?php get_header(); ?>
<div class="content-row">
<body>
    <div id="map"></div>
    <div id="form">
      <table>
          <!-- tää on kartalle tulevan merkin infowindowin sisälle tuleva formi, jonka pitäis lähettää noi tiedot databaseen (en osannu saada toimia) ja vielä väärät tiedot menee koska säätö-->
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
 
    <?php
    // tää koodi on pluginista, formi joka ottaa kuvan, tägin ja titlen postille. Laittaa kuvan thumbnailiksi koska jos menee contentin sisälle ei näy sivulla ja hauissa
    if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>


   
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
        //tän pitäis laittaa tiedot databaseen mut ei toimi (pitää tehä erikseen databaseen oma taulu tätä varten) ja tehä joku oma php file missä ne jutut mitkä tajuu et yhdistetään sinne. yritin monta kertaa mutten osannut murr
function saveData() {
        var name = escape(document.getElementById('name').value);
        var address = escape(document.getElementById('address').value);
        var type = document.getElementById('type').value;
        var latlng = marker.getPosition();
          /* ei toimi ne jutut tuolla merkkiuploadissa*/ $.get('merkkiupload.php',{lat:latlng.lat(),lng:latlng.lng(),name:name,adress:address, type:type})
     .done(function(data){  
      alert("Data Loaded: " + data);
     });
    };

    </script>
    
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM&callback=initMap"
    async defer></script>
        
</body>



    

<?php get_footer();?>