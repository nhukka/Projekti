<?php /* Template Name: etusivu-template */ ?>
<?php get_header(); ?>
<div class="content-row">
    <img src="http://users.metropolia.fi/~ilkkaper/katukuva/wp-content/themes/Projekti/img/LogoKK_pieni.png">
   
    <div class="kaupungit">
        
        <h1 class="hel">HELSINKI</h1>
        <div class="hpiilo">
            
       <!-- MUISTA NEA TEHÄ KUVISTA LINKIT JOISTA AUKEE LIGHTBOX!!
            MUOKKAA KUVIEN LIIKKUMINEN ETTEI MUOKKAA MARGINAALIA
            RESPONSIIVISUUS NAVILLE, KUVILLE, TEKSTEILLE.


BUTTONIT EI TOGGLAA DIVIN MUKANA, VAAN HETI TEKSTIÄ KLIKATTUA LATAUTUU RUUDULLE. TEKSTIÄ UUDELLEEN KLIKATTAESSA BUTTONIT KATOAA VASTA, KUN DIV ON MENNYT PIILOON, TÄÄ PITÄÄ FIXATA-->  
            
            <ul>
            <?php
                
                //MUISTA VAIHTAA SUN OMAT ID NOIHIN ET TOIMII SULLA
                $id = get_queried_object()->term_id;
                    $the_query = new WP_Query( array( 
                        'tag_id' => 3,
                    'category' => $id) );
            
                    if ( $the_query->have_posts() ) {
                       
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();?>
            
              <a href="#myModal-<? the_ID(); ?>" data-toggle="modal" > 
             <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>  </a>
                
                <div id="myModal-<? the_ID(); ?>" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg">
             <div class ="row">
                 <div class="col-12" id="sulku"><button type="button" class="close" data-dismiss="modal">&#215;</button></div>
                 </div>
        <div class ="row">
        <div class="col-12">
            <h3><?php the_title();?></h3>
        </div>
        </div>     
        <div class ="row">     
        <div class="col-12">
             <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="col-12"> 
            <?php echo get_the_tag_list();?></div>
        </div>
     </div>
    </div>
    
                <?php

                        }
                       
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
            
                    <button class="h_vasen"></button>
                    <button class="h_oikea"></button>
            </ul>
        </div>
        
        <h1 class="esp">ESPOO</h1>
            <div class="epiilo">
                <ul>
                <?php
                
                //MUISTA VAIHTAA SUN OMAT ID NOIHIN ET TOIMII SULLA
                $id = get_queried_object()->term_id;
                    $the_query = new WP_Query( array( 
                        'tag_id' => 4,
                    'category' => $id) );
            
                    if ( $the_query->have_posts() ) {
                       
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();?>
            
             
              <a href="#myModal-<? the_ID(); ?>" data-toggle="modal" > 
             <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>  </a>
                
                <div id="myModal-<? the_ID(); ?>" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg">
             <div class ="row">
                 <div class="col-12" id="sulku"><button type="button" class="close" data-dismiss="modal">&#215;</button></div>
                 </div>
        <div class ="row">
        <div class="col-12">
            <h3><?php the_title();?></h3>
        </div>
        </div>     
        <div class ="row">     
        <div class="col-12">
             <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="col-12"> 
            <?php echo get_the_tag_list();?></div>
        </div>
     </div>
    </div>
                <?php
                        }
                       
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
            
                    <button class="e_vasen"></button>
                    <button class="e_oikea"></button>
                     </ul>
            </div>
        
        <h1 class="van">VANTAA</h1>    
            <div class="vpiilo">
                <ul>
       <?php
                
                //MUISTA VAIHTAA SUN OMAT ID NOIHIN ET TOIMII SULLA
                $id = get_queried_object()->term_id;
                    $the_query = new WP_Query( array( 
                        'tag_id' => 5,
                    'category' => $id) );
            
                    if ( $the_query->have_posts() ) {
                       
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();?>
            
             
              <a href="#myModal-<? the_ID(); ?>" data-toggle="modal" > 
             <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>  </a>
                
                <div id="myModal-<? the_ID(); ?>" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg">
             <div class ="row">
                 <div class="col-12" id="sulku"><button type="button" class="close" data-dismiss="modal">&#215;</button></div>
                 </div>
        <div class ="row">
        <div class="col-12">
            <h3><?php the_title();?></h3>
        </div>
        </div>     
        <div class ="row">     
        <div class="col-12">
             <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="col-12"> 
            <?php echo get_the_tag_list();?></div>
        </div>
     </div>
    </div>
                <?php
                        }
                       
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
            
                    <button class="v_vasen"></button>
                    <button class="v_oikea"></button>
                     </ul>
            </div>
            
</div>  
</div>
    
    <?php get_footer();?>