<?php get_header(); ?>

	<h1 class="site__heading">Le Catalogue de logements</h1>

	<div class="site__logements">
    	<main class="site__content">
        	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <article class="post">
                <?php the_post_thumbnail(); ?>

                <h1><?php the_title(); ?></h1>

                <div class="post__meta">
                  <p>
                    Publié le <?php the_date(); ?>
                    par <?php the_author(); ?>
                    Dans la catégorie <?php the_category(); ?>
                    Avec les étiquettes <?php the_tags(); ?>
                  </p> 
                  <?php the_terms( get_the_ID() , 'type-Logement' ); ?>
                </div>

                <div class="post__content">
                  <?php the_content(); ?>
                </div>
            </article>
                
            <?php endwhile; endif; ?>
            <div class="site__navigation">
	            <div class="site__navigation__prev">
	            	<?php previous_posts_link('Page Précédente'); ?>
                </div>
                <div class="site__navigation__next">
                    <?php next_posts_link( 'Page Suivante' ); ?> 
                </div>
            </div>            
        </main>

        <aside class="site__sidebar">
        	<ul>
            	<?php dynamic_sidebar( 'nomSideBarFiltre' ); ?>
            </ul>
        </aside>
	</div> 

<?php get_footer(); ?>

