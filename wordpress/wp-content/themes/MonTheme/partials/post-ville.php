<article class="container_villes">
    <h3><?php the_terms(get_the_ID(), 'localisation'); ?></h3>
    <a class="main-btn" href="<?php the_permalink(get_the_ID(), 'localisation') ?>">Voir plus</a> <!-- btn qui redirige vers la page avec filtre  -->
</article>