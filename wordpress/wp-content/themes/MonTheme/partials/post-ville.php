<article class="post_container">
    <?php the_post_thumbnail(); ?>

    <h3><?php the_title(); ?></h3>
    
    <div class="post_content">
        <?php the_terms(get_the_ID(), 'type-Logement'); ?>
        <?php the_terms(get_the_ID(), 'localisation'); ?>
        <?php $meta1 = get_post_meta(get_the_ID(), 'MonTheme_caracteristiques_prix', true); ?>
        <div class="post_description">
            <?php the_content(); ?>
        </div>
    </div>

    <a class="main-btn" href="<?php the_permalink() ?>">Voir plus</a>
        
</article>
<hr>