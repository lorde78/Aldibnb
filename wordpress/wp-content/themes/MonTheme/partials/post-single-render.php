<article class="post-single-post">
    <?php the_post_thumbnail(); ?>

    <h2><?php the_title(); ?></h2>
    <h1>essaieeeeeeeeeeeeeeeeeeeeeeeee</h1>
    <div class="post_meta">
        <div class="post_categories">
            <span>Type: <?php the_terms(get_the_ID(), 'type-Logement'); ?> </span>
            <span>Localisation: <?php the_terms(get_the_ID(), 'localisation'); ?> </span>

        </div>
        <?php $meta = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_nombredechambres', true); ?>
        <?php $meta1 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_prix', true); ?>
        <?php $meta2 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_description', true); ?>
        <?php $meta3 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_surface', true) ?>
        <div class="post_caracteristiques">
            <span>Nombres de chambres :<?= $meta; ?></span>
            <span>Surface :<?= $meta3; ?></span>
            <span>Prix :<?= $meta1; ?></span>
        </div>
    </div>

    <a class="main-btn" href="<?php the_permalink() ?>">Voir plus
    </a>
</article>