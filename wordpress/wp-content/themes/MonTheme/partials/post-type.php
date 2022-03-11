<article class="post">
            <?php the_post_thumbnail(); ?>

            <h2><?php the_title(); ?></h2>
            <a href="<?php the_permalink() ?>">
                <span>Voir plus</span>
            </a>
            <div class="post__meta">
                <?php the_terms(get_the_ID(), 'type-Logement'); ?>
                <?php the_terms(get_the_ID(), 'localisation'); ?>
                <?php $meta = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_nombredechambres', true); ?>
                <?php $meta1 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_prix', true); ?>
                <?php $meta2 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_description', true); ?>
                <?php $meta3 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_surface', true) ?>

                <p>Nombres de chambres :<?= $meta; ?></p>
                <p>Surface :<?= $meta3; ?></p>
                <p>Prix :<?= $meta1; ?></p>
                <p>Description :<?= $meta2; ?></p>
            </div>
            <p> Publié le <?php the_date(); ?> par <?php the_author(); ?> Dans la catégorie <?php the_category(); ?> Avec les étiquettes <?php the_tags();
                                                                                                                                            the_ID(); ?>

            </p>

            <div class="post__content">
                <?php the_content(); ?>
            </div>
        </article>
        <hr>