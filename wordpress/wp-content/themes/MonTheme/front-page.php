<?php get_header(); ?>

    <div class="taxonomie">
        <h2>Catégories :</h2>
        <ul>
            <?php
                $terms = get_terms(['taxonomy' => 'type-Logement']);
                foreach($terms as $term) {
                    $active = get_query_var('type-Logement') === $term->slug ? active : '';
                    echo '<a class="linTerm '. $active .'" href="' . get_term_link($term) . '">' . $term->name . '</a><br>';
                };
            ?>
        </ul>
    </div>

    <div class="metaFiltre">
        <h2>Systeme de filtres :</h2>
        <ul>
            <?php
            ?>
        </ul>
    </div>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>