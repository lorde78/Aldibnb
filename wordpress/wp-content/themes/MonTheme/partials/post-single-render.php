<article class="post-single-post">
    <div class="post-single-post-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="post-single-post-content">
        <h2><?php the_title(); ?></h2>
        <div class="post_meta">
            <div class="post_categories">
                <span>Type : <?php the_terms(get_the_ID(), 'type-Logement'); ?> </span>
                <span>Localisation : <?php the_terms(get_the_ID(), 'localisation'); ?> </span>
            </div>
            <?php $meta = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_nombredechambres', true); ?>
            <?php $meta1 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_prix', true); ?>
            <?php $meta2 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_description', true); ?>
            <?php $meta3 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_surface', true) ?>
            <div class="post_caracteristiques">
                <span>Nombres de chambres : <?= $meta; ?></span>
                <span>Surface : <?= $meta3; ?>m²</span>
                <span>Prix : <?= $meta1; ?>€</span>
                <div class="post_caracteristiques_description">
                    <span>Description :</span>
                    <span><?= $meta2; ?></span>
                </div>
                <div class="comment_container">
                    <div class="comments">
                        <div class="formComments">
                            <?php

                            if (comments_open()) {
                                comments_template();
                            }
                            ?>
                        </div>
                    </div>
                    <div class="displayComments">
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
                </div>
            </div>
        </div>
    </div>
</article>