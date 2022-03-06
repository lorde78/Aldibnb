<?php get_header(); ?>

    <h1>Page d'acceuil</h1>

    <?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args=array(
			'post_type' =>'logements',
			'posts_per_page' =>5,
			'paged' => $paged

			);
			$query = new WP_Query( $args ); //Check the WP_Query docs to see how you can limit which posts to display ?>
			<?php if ( $query->have_posts() ): ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="single-logements-archive">
                        <?php the_title(); ?>
                        <?php the_content(); ?>
                        <?php the_post_thumbnail_url(); ?>
                    </div>
                <?php endwhile ?>
            <?php endif; ?>


            <?php wp_reset_postdata(); ?>
                       
<?php get_footer(); ?>