<?php
/*
Template Name: Page Archives Catalogue
*/
?>

<?php get_header(); ?>
<?php get_template_part('templates/template-searchFilter') ?>
<h1>Le Catalogue de logements</h1>

<div class="site__logements">
    <main class="site__content">
        <?php if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('partials/post-render');
            endwhile;
            MonTheme_paginate_links();
        endif; ?>
         <?php wp_reset_postdata(); ?>
    </main>
    
    <aside class="site__sidebar">
        <ul>
            <?php dynamic_sidebar('nomSideBarFiltre'); ?>
        </ul>
    </aside>
</div>

<?php get_footer(); ?>