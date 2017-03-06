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
       // if (isset ($_POST['description'])) {
        //        $description = htmlentities(trim(stripcslashes($_POST['description'])));
//    } else {
  //      echo 'Please enter the content';
    //    }
 
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
  
    
        $new_post = wp_insert_post($post_array);
    
        if (!function_exists('wp_generate_attachment_metadata')){
                require_once(ABSPATH . "wp-admin" . '/includes/post.php');
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            }
             if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                        return "upload error : " . $_FILES[$file]['error'];
                    }
                    $attachment_id = media_handle_upload( $file, $new_post );
                    set_post_thumbnail($new_post,$attachment_id);
                }   
            }
           

    
        wp_set_post_terms($post_id,$type,'Type',true);
        add_post_meta($post_id, 'metadisplayLat', $displaylat, false);
        add_post_meta($post_id, 'metadisplayLong', $displaylong, false);
       
        
       
        
        wp_redirect( home_url('/listing-submitted/') ); // redirect to home page after submit
        exit();
 
            if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                    $newupload = insert_attachment($file,$post_id);
                    // $newupload returns the attachment id of the file that
                    // was just uploaded. Do whatever you want with that now.
                }
        }
}
 // end IF

?>

<?php get_header(); ?>
  <div id="container">
                <div id="content" role="main">
 
                        <h1 class="page-title">Lisää katukuva</h1>
 
<!--SUBMIT POST-->
                    <div id="map"></div>
                    
                    
                        <form id="new_post" name="new_post" class="post_work" method="post" enctype="multipart/form-data">
                                <p><label for="title">Otsikko</label><br />
                                        <input type="text" id="title" class="required" value="" tabindex="1" size="20" name="title" />
                                </p>
                              <!--  <p><label for="description">Kuvaus</label><br />
                                        <textarea id="description" type="text" class="required" tabindex="3" name="description" cols="50" rows="6"></textarea>
                                </p>  
 
                               
<!--                            <p><label for="attachment">Photos: </label>
                                        <input type="file" id="attachment">
                                        <div id="attachment_list"></div></p>
-->
                            
                                <input type="file" name="thumbnail" id="thumbnail">
 
                                <p>Tägit: <input type="text" value="" tabindex="35" name="post_tags" id="post_tags" /></p>
                                <input type="hidden" name="post_type" id="post_type" value="domande" />
                                <input type="hidden" name="action" value="post" />
 
                                <p align="right"><input type="submit" value="Submit" tabindex="6" id="submit" name="submit" /></p>
                            
                                Lat 1:<input type="text" size="20" maxlength="50" name="displayLat" id="displayLat"><br />
                                Long 1:<input type="text" size="20" maxlength="50" name="displayLong" id="displayLong"><br />
 
                                <?php wp_nonce_field( 'new-post' ); ?>
                        </form>
 
                     
                        <script>
                            
                            var map;
                            var marker;
                                //näyttää kartan sivulla
                                function initMap() {
                                    var suomi = {lat: 60.8215965, lng: 24.9911299};
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: suomi,
                                        zoom: 13
                                        });
      
          
                                //lisää paikkatiedon formiin, piilotettuihin inputteihin. EI VIELÄ TALLENNU MINNEKKÄÄN
                                google.maps.event.addListener(map, 'click', function(event) {
                                document.getElementById('displayLat').value = event.latLng.lat();
                                document.getElementById('displayLong').value = event.latLng.lng(); 
                                });
 
                                //lisää markkerin kartalle, EI TOIMI VIELÄ
                                google.maps.event.addListener(map, 'click', function(event) {
                                    marker = new google.maps.Marker({
                                        position: event.latLng,
                                        map: map
                                        });
                                });
                                }
                        </script>
                         <!-- <script>  
                            var multi_selector = new MultiSelector( document.getElementById( 'attachment_list' ), 8 );
                            multi_selector.addElement( document.getElementById( 'attachment' ) );
                        </script> -->
                    
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM&callback=initMap"async defer></script>
                    
 
<!--SUBMIT POST END-->
 
                </div><!-- .content -->
            </div><!-- #container -->
 
<?php get_footer(); ?>

