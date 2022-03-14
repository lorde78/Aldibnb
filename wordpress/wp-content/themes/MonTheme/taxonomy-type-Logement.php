<?php get_header(); ?>
    <?php get_template_part('templates/template-searchFilter') ?>
    <h2 class="titre_typedelogement">Types de logements</h2>
<section class="maSectionTypedeLogement">
    
    <?php if (have_posts()) : while (have_posts()) : the_post();
            get_template_part('partials/post-render');
        endwhile;
    endif; ?>
    <?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>