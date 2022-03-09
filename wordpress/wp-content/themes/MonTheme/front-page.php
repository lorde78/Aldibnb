<?php get_header(); ?>

<?php

$query_loft = new WP_Query([
    'post_type' => 'Logement',
    'tax_query' => [
        [
            'taxonomy' => 'type-Logement',
            'field' => 'slug',
            'terms' => 'loft'
        ]
    ],
    'posts_per_page' => 1,
]);

$query_appartement = new WP_Query([
    'post_type' => 'Logement',
    'tax_query' => [
        [
            'taxonomy' => 'type-Logement',
            'field' => 'slug',
            'terms' => 'a   ppartement'
        ]
    ],
    'posts_per_page' => 1,
    'orderby' => 'rand'
]);

$query_villa = new WP_Query([
    'post_type' => 'Logement',
    'tax_query' => [
        [
            'taxonomy' => 'type-Logement',
            'field' => 'slug',
            'terms' => 'villa'
        ]
    ],
    'posts_per_page' => 1,
    'orderby' => 'rand'
]);
?>

<?php if ($query_loft->have_posts()) : ?>
    <?php
    while ($query_loft->have_posts()) : $query_loft->the_post();
    ?>
        <?php get_template_part('partials/post-render'); ?>
<?php endwhile;
endif;
wp_reset_postdata();
?>

<?php if ($query_appartement->have_posts()) : ?>
    <?php
    while ($query_appartement->have_posts()) : $query_appartement->the_post();
    ?>
        <?php get_template_part('partials/post-render'); ?>
<?php endwhile;
endif;
wp_reset_postdata(); ?>

<?php if ($query_villa->have_posts()) : ?>
    <?php
    while ($query_villa->have_posts()) : $query_villa->the_post();
    ?>
        <?php get_template_part('partials/post-render'); ?>
<?php endwhile;
endif;
wp_reset_postdata(); ?>

<?php get_footer(); ?>