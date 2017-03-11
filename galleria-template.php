<?php /* Template Name: galleria-template */ ?>


<?php get_header(); ?>
<div id="container">
<div class="content-row">
    <main>
        <?php
        $id = get_queried_object()->term_id;
       $the_query = new WP_Query( array( 
                        'category' => $id, 'numberposts' => 999 ) );
            
                    if ( $the_query->have_posts() ) {
                       
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();?>
             <article>
        <a href="#myModal-<? the_ID(); ?>" data-toggle="modal" >
           <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>
            </a>
        </article>
  <div id="myModal-<? the_ID(); ?>" class="modal fade" role="dialog">
         <div class="modal-dialog">
      <div class ="row">
          <div class="col-10"><h3><?php the_title();?></h3></div>
          <div class="col-2"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
             </div>
             <div class ="row">
             
          <div class="col-12">
          <?php echo get_the_post_thumbnail(); ?></div>
       
      
      
          <div class="col-12"> <?php echo get_the_tag_list();?></div></div>
     
    </div>
         </div>
            <?php
                        }
                       
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
    
        
    </main>
</div>
</div>    
<?php
get_footer();
?>