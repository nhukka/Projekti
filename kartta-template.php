<?php /* Template Name: kartta-template */ ?>



<?php get_header(); ?>
  <div id="container">
                <div id="content" role="main">
 
                    <div id="map"></div>
<script>
 var Koordinaatit = {
lat: {<?php echo get_post_meta($post->ID, 'metadisplayLat', true) ?>, lng <?php
echo get_post_meta($post->ID, 'metadisplayLong', true);
?>
}};
</script>           
                    
                     <?php
                    $the_query = new WP_Query( array() );
                    if ( $the_query->have_posts() ) {
                        echo '<script>
                        var Koordinaatit = [';
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '{lat:'.
                            get_post_meta($post->ID, 'metadisplayLat', true) .',lng:'. get_post_meta($post->ID, 'metadisplayLong', true).'}';
                            
                        }
                        echo ']</script>';
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
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
      
          
                               
                                };
                                
                        </script>
                    
                    
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM&callback=initMap"async defer></script>
                    

 
                </div><!-- .content -->
            </div><!-- #container -->
 
<?php get_footer(); ?>

