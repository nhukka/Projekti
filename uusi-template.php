<?php /* Template Name: uusi-template */ ?>


<?php
// Check if the form was submitted
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] )) {
 
        // Do some minor form validation to make sure there is content
        if (isset ($_POST['title'])) {
                $title =  $_POST['title'];
        } else {
                echo 'Please enter a title';
        }
 
        $tags = $_POST['post_tags'];
        $displaylat = $_POST['displayLat'];
        $displaylong = $_POST['displayLong'];
        

        // Add the content of the form to $post as an array
        $type = trim($_POST['Type']);
        $post = array(
                'post_title'    => $title,
                //'post_content'  => $file,
                'post_status'   => 'publish',                     // Choose: pending, preview, future, etc. <- tällä pystyis moderoimaan postauksia, jos laittaa pending niin adminin on hyväksyttävä ennen ku tulee julkiseksi
                'tags_input'    => array($tags),
                'tax_input'    => array( $type),
                'comment_status' => 'closed',
                'post_author' => '2',
                'displayLat'    =>   $displaylat,
                'displayLong'    =>   $displaylong
                       
        );
    
        $post_id = wp_insert_post($post);
  
        //$new_post = wp_insert_post($post_array);
    
        if (!function_exists('wp_generate_attachment_metadata')){
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            }
             if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                        return "upload error : " . $_FILES[$file]['error'];
                    }
                    $attach_id = media_handle_upload( $file, $post_id );
                    //set_post_thumbnail($new_post,$attach_id);
                }   
            }
             if ($attach_id > 0){
                //and if you want to set that image as Post  then use:
                update_post_meta($post_id,'_thumbnail_id',$attach_id);
            }

    
        wp_set_post_terms($post_id,$type,'Type',true);
        add_post_meta($post_id, 'metadisplayLat', $displaylat, false);
        add_post_meta($post_id, 'metadisplayLong', $displaylong, false);
       
        
       
        
        wp_redirect( home_url('') ); // redirect to home page after submit
       
}
 // end IF

?>

<?php get_header(); ?>
  <div id="container">
                <div id="content" role="main">
 
                        <h1 class="page-title">LISÄÄ KATUKUVA</h1>
                        <h3 class="page-exrpt">Klikkaa kartalle ja lisää tiedosto.</h3>
 
<!--SUBMIT POST-->
                    <div id="map"></div>
                    
                    
                        <form id="new_post" name="new_post" class="post_work" method="post" enctype="multipart/form-data">
                                
                                <input class="formi" type="text" id="title" class="required" value="" tabindex="1" size="20" name="title" placeholder="OTSIKKO.."/>
                                
                                <input class="formi" type="text" value="" tabindex="35" name="post_tags" placeholder="TÄGIT.." id="post_tags" />
                                <input type="hidden" name="post_type" id="post_type" value="domande" />
                                <input type="hidden" name="action" value="post" />
                            
                                <label for="thumbnail">VALITSE KUVA</label>
                                <input type="file" name="thumbnail" id="thumbnail">
                                
                                <label for="submit">LÄHETÄ</label>
                                <input type="submit" value="Submit" tabindex="6" id="submit" name="submit" />
                            
                                <input type="hidden" size="20" maxlength="50" name="displayLat" id="displayLat"><br />
                                <input type="hidden" size="20" maxlength="50" name="displayLong" id="displayLong"><br />
 
                                <?php wp_nonce_field( 'new-post' ); ?>
                        </form>
 
                     
                        <script>
                            
                        var map;
                        var marker;
                            //näyttää kartan sivulla
                            function initMap() {
                                var suomi = {lat: 60.230635, lng: 25.404319};
                                
                           
                        var myOptions = {
                        zoom: 10,
                        center: suomi,
                        disableDefaultUI: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [{
                            "stylers": [{
                                "saturation": 30
                            }, {
                                "lightness": 100
                            }]
                        }, {
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#f5f5f5"
                            }]
                        }, {
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        }, {
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#616161"
                            }]
                        }, {
                            "elementType": "labels.text.stroke",
                            "stylers": [{
                                "color": "#f5f5f5"
                            }]
                        }, {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#bdbdbd"
                            }]
                        }, {
                            "featureType": "landscape",
                            "stylers": [{
                                "color": "#bfbfbf"
                            }, {
                                "saturation": -5
                            }]
                        }, {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#eeeeee"
                            }]
                        }, {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#757575"
                            }]
                        }, {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#dbdbdb"
                            }, {
                                "visibility": "simplified"
                            }]
                        }, {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#9e9e9e"
                            }]
                        }, {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#ffffff"
                            }]
                        }, {
                            "featureType": "road.arterial",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#757575"
                            }]
                        }, {
                            "featureType": "road.highway",
                            "stylers": [{
                                "saturation": -5
                            }, {
                                "visibility": "off"
                            }]
                        }, {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#dadada"
                            }]
                        }, {
                            "featureType": "road.highway",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#616161"
                            }]
                        }, {
                            "featureType": "road.local",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#9e9e9e"
                            }]
                        }, {
                            "featureType": "transit.line",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#e5e5e5"
                            }]
                        }, {
                            "featureType": "transit.station",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#eeeeee"
                            }]
                        }, {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [{
                                "color": "#c9c9c9"
                            }]
                        }, {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#9e9e9e"
                            }]
                        }]
                    };

                      map = new google.maps.Map(document.getElementById('map'), myOptions);          
      
          
                                //lisää paikkatiedon formiin, piilotettuihin inputteihin.
                                google.maps.event.addListener(map, 'click', function(event) {
                                document.getElementById('displayLat').value = event.latLng.lat();
                                document.getElementById('displayLong').value = event.latLng.lng(); 
                                });
 
                                
                                google.maps.event.addListener(map, 'click', function(event) {
                                    placeMarker(event.latLng);
                                });

                                function placeMarker(location) {

                                    if (marker == undefined){
                                            marker = new google.maps.Marker({
                                                position: event.latLng,
                                                map: map 
                                                
                                            });
                                    }
                                    else{
                                        marker.setPosition(location);
                                    }
                                    

                                }

                                
                                }
                        </script>
                    
                    
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM&callback=initMap"async defer></script>
                    
 
<!--SUBMIT POST END-->
 
                </div><!-- .content -->
            </div><!-- #container -->
 
<?php get_footer(); ?>

