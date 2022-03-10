<?php get_header(); ?>

<?php
function displayPostPerCategory($typeTaxonomie, $typeLogement1)
{
    $query = new WP_Query([
        'post_type' => 'Logement',
        'tax_query' => [
            [
                'taxonomy' => $typeTaxonomie,
                'field' => 'slug',
                'terms' => [$typeLogement1]
            ]
        ],
        'posts_per_page' => 1,
        'orderby' => 'rand'
    ]);

    return $query;
}

$query_loft = displayPostPerCategory('type-Logement', "loft");
$query_appartement = displayPostPerCategory('type-Logement', "appartement");
$query_villa = displayPostPerCategory('type-Logement', "villa");
$query_paris = displayPostPerCategory('localisation', "Paris");
$query_lille = displayPostPerCategory('localisation', "Lille");
$query_dijon = displayPostPerCategory('localisation', "Dijon");
$query_bordeaux = displayPostPerCategory('localisation', "Bordeaux");

$arrayPostPerCategoryType = [$query_loft, $query_appartement, $query_villa];
$arrayPostPerCity = [$query_paris, $query_lille, $query_dijon, $query_bordeaux];
?>

<h1>Nos villes :</h1>
<?php
for ($i = 0; $i <= count($arrayPostPerCity) - 1; $i++) {
    if ($arrayPostPerCity[$i]->have_posts()) :
        while ($arrayPostPerCity[$i]->have_posts()) : $arrayPostPerCity[$i]->the_post(); ?>
            <?php get_template_part('partials/post-ville'); ?>
<?php endwhile;
    endif;
    wp_reset_postdata();
} ?>

<h1>Nos Tendances :</h1>
<?php
for ($i = 0; $i <= count($arrayPostPerCategoryType) - 1; $i++) {
    if ($arrayPostPerCategoryType[$i]->have_posts()) :
        while ($arrayPostPerCategoryType[$i]->have_posts()) : $arrayPostPerCategoryType[$i]->the_post(); ?>
            <?php get_template_part('partials/post-render'); ?>
<?php endwhile;
    endif;
    wp_reset_postdata();
} ?>




<?php get_footer(); ?>