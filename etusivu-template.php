<?php /* Template Name: etusivu-template */ ?>
<?php get_header(); ?>
<div class="content-row">
    <img src="http://localhost/wordpress/wp-content/themes/Projekti/img/LogoKK_pieni.png">
   
    <div class="kaupungit">
        
        <h1 class="hel">HELSINKI</h1>
        <div class="hpiilo">
            
       <!-- MUISTA NEA TEHÄ KUVISTA LINKIT JOISTA AUKEE LIGHTBOX!!
            MUOKKAA KUVIEN LIIKKUMINEN ETTEI MUOKKAA MARGINAALIA
            RESPONSIIVISUUS NAVILLE, KUVILLE, TEKSTEILLE-->   
            
                <?php
                    $the_query = new WP_Query( array( 'tag_id' => 8 ) );
                    if ( $the_query->have_posts() ) {
                        echo '<ul>';
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<li>' . get_the_content() . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
                    <button class="h_vasen"></button>
                    <button class="h_oikea"></button>
            
          
            
        </div>
        <h1 class="esp">ESPOO</h1>
            <div class="epiilo">
                <?php
                    $the_query = new WP_Query( array( 'tag_id' => 12 ) );

                    if ( $the_query->have_posts() ) {
                        echo '<ul>';
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<li>' . get_the_post_thumbnail() . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
                    <button class="e_vasen"></button>
                    <button class="e_oikea"></button>
            </div>
        
        <h1 class="van">VANTAA</h1>    
            <div class="vpiilo">
                <?php
                    $the_query = new WP_Query( array( 'tag_id' => 13 ) );
                    if ( $the_query->have_posts() ) {
                        echo '<ul>';
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<li>' . get_the_content() . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
                    <button class="v_vasen"></button>
                    <button class="v_oikea"></button>
            </div>
            
</div>  
    
    <?php get_footer();?>