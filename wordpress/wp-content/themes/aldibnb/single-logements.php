<?php get_header() ?>

<h1>Voir mon logement</h1>

<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
        <?php the_post_thumbnail_url(); ?>
    <?php endwhile ?>
<?php endif; ?>