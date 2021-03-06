<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
    get_template_part('partials/post-single-render');
  endwhile;
endif; ?>

<div class="comments">
  <div class="formComments">
    <?php

    if (comments_open()) {
      comments_template();
    }
    ?>
  </div>
</div>
<div class="displayComments nondisplay">
  <?php if (have_comments()) : ?>
    <ol class="post-comments">
      <?php
      wp_list_comments(array(
        'style'       => 'ol',
        'short_ping'  => true,
      ));
      ?>
    </ol>
  <?php else : ?>
    <p class="comments__none">
      Il n'y a pas de commentaires pour le moment!
    </p>
  <? endif; ?>
</div>
<?php
$terms_slug = [];
$terms = get_the_terms(get_the_ID(), 'type-Logement');
foreach ($terms as $term) {
  $terms_slug[] = $term->name;
}

$query = new WP_Query([
  'post_type' => 'Logement',
  'post__not_in' => [get_the_ID()],
  'tax_query' => [
    [
      'taxonomy' => 'type-Logement',
      'field' => 'slug',
      'terms' => $terms_slug
    ]
  ],
  'post_per_page' => 3,
  'orderby' => 'rand'
]);
?>
<section class="annonceSimilaire">

  <?php if ($query->have_posts()) : ?>
    <h2>Autres annonce similaires</h2>
    <div class="post_similaire_container">
      <?php
      while ($query->have_posts()) : $query->the_post();
      
        get_template_part('partials/post-render');
        
    ?>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>