<?php
/*
Template Name: Page Archives Catalogue
*/
?>

<?php get_header(); ?>

	<h1 class="site__heading">Le Catalogue de logements</h1>

	<div class="site__logements">
    	<main class="site__content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); 
            get_template_part('partials/post-render');
        endwhile; endif; ?>           
        </main>

        <aside class="site__sidebar">
        	<ul>
            	<?php dynamic_sidebar( 'nomSideBarFiltre' ); ?>
            </ul>
        </aside>
	</div> 

<?php get_footer(); ?>