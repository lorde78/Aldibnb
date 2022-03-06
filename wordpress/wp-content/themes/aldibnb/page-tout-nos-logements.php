<?php

/**
 * Template Name: Tout nos logements
 * Description : Catalogue 
 */

?>
<?php
/**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
    $args = array(  
        'post_type' => 'logements',
        'post_status' => 'publish',
        'posts_per_page' => 2, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        print the_title(); 
        the_content();
        the_author();
        //the_excerpt(); 
    endwhile;

    wp_reset_postdata(); 

    ?>
