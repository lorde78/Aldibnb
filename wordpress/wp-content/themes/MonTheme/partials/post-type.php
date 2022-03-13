<article class="container_types_logements">
    <h3><?php the_terms(get_the_ID(), 'type-Logement'); ?></h3>
    <a class="main-btn" href="<?php the_permalink() ?>">Voir plus</a> <!-- btn qui redirige vers la page avec filtre  -->
</article>