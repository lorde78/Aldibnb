<?php get_header(); ?>
    <?php get_template_part('templates/template-searchFilter') ?>
<section class="maSectionTypedeLogement">
    <?php if (have_posts()) : while (have_posts()) : the_post();
            get_template_part('partials/post-type');
        endwhile;
    endif; ?>
</section>

<?php get_footer(); ?>