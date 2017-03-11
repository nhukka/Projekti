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
            $id = get_queried_object()->term_id;
              $artikkelit = get_posts( array('tag_id' => 3, 'numberposts' => 999) );
        
            foreach($artikkelit as $artikkeli):
        ?>
       
        <a href="<?php echo get_permalink($artikkeli->ID); ?>">
           <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>
            
            </a>
        
        <?php endforeach; ?>
                    <button class="h_vasen"></button>
                    <button class="h_oikea"></button>
                     </ul>
        </div>
        
        <h1 class="esp">ESPOO</h1>
            <div class="epiilo">
                 <ul>
                 <?php
            $id = get_queried_object()->term_id;
              $artikkelit = get_posts( array('tag_id' => 4, 'numberposts' => 999) );
        
            foreach($artikkelit as $artikkeli):
        ?>
       
        <a href="<?php echo get_permalink($artikkeli->ID); ?>">
           <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>
            
            </a>
        
        <?php endforeach; ?>
                    <button class="e_vasen"></button>
                    <button class="e_oikea"></button>
                     </ul>
            </div>
        
        <h1 class="van">VANTAA</h1>    
            <div class="vpiilo">
                <ul>
                 <?php
            $id = get_queried_object()->term_id;
              $artikkelit = get_posts( array('tag_id' => 5, 'numberposts' => 999) );
        
            foreach($artikkelit as $artikkeli):
        ?>
       
        <a href="<?php echo get_permalink($artikkeli->ID); ?>">
           <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>
            
            </a>
        
        <?php endforeach; ?>
                    <button class="v_vasen"></button>
                    <button class="v_oikea"></button>
                     </ul>
            </div>
            
</div>  
</div>
    
    <?php get_footer();?>