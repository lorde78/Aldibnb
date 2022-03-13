<?php
/*
Template Name: Page Archives Catalogue
*/
?>

<?php get_header(); ?>
<section class="main">
	<?php get_template_part('templates/template-searchFilter') ?>
	<h1>Le Catalogue de logements</h1>

	<section class="catalogue">
		<main class="catalogue_container">
			<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part('partials/post-render');
				endwhile;
				MonTheme_paginate_links();
			endif; ?>
		</main>

		<aside class="site__sidebar">
			<ul>
				<?php dynamic_sidebar('nomSideBarFiltre'); ?>
			</ul>
		</aside>
	</section>
</section>

<?php get_footer(); ?>