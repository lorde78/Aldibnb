<?php
/*
Template Name: Page Archives Catalogue
*/
?>

<?php get_header(); ?>
<section class="main">
	<?php get_template_part('templates/template-searchFilter') ?>
	<?php if (!is_front_page() && !is_single()) : ?>
                <form action="<?php esc_url(home_url('/')); ?>">
                    <input type="search" placeholder="Rechercher" aria-label="Rechercher" name="s" value="<?= get_search_query(); ?>">
                    <button class="submitSearch" type="submit">Rechercher</button>
                </form>
            <?php endif; ?>
	<h1>Le Catalogue de logements</h1>
	<section class="catalogue">
		<main class="catalogue_container">
			<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part('partials/post-render');
				endwhile;
				
			endif; ?>
		</main>
		<div class="paginate"><?php MonTheme_paginate_links();?></div>
		<aside class="site__sidebar">
			<ul>
				<?php dynamic_sidebar('nomSideBarFiltre'); ?>
			</ul>
		</aside>
	</section>
</section>


<?php get_footer(); ?>