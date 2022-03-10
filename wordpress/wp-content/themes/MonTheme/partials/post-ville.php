<article class="post">
    <?php the_post_thumbnail(); ?>

    <h1><?php the_title(); ?></h1>
    <a href="<?php the_permalink() ?>">
        <h3>Voir plus</h3>
    </a>
    <div class="post__meta">
        <?php the_terms(get_the_ID(), 'type-Logement'); ?>
        <?php the_terms(get_the_ID(), 'localisation'); ?>
        <?php $meta1 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_prix', true); ?>
        <div class="post__content">
            <?php the_content(); ?>
        </div>
</article>
<hr>