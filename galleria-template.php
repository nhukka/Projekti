<?php /* Template Name: galleria-template */ ?>


<?php get_header(); ?>
<div id="container">
<div class="content-row">
    <main>
       
        
        <?php
            $id = get_queried_object()->term_id;
              $artikkelit = get_posts( array('category' => $id, 'numberposts' => 999) );
        
            foreach($artikkelit as $artikkeli):
        ?>
        <article>
        <a href="<?php echo get_permalink($artikkeli->ID); ?>">
           <?php echo get_the_post_thumbnail($artikkeli->ID, 'thumbnail'); ?>
            
            </a>
        </article>
        <?php endforeach; ?>
    </main>
</div>
</div>    
<?php
get_footer();
?>