<?php

function MonTheme_query_vars($params)
{
    $params[] = 'prix';
    $params[] = 'surface';
    $params[] = 'nbrChambre';
    $params[] = 'ville';
    $params[] = 'nombreDePersonne';
    $params[] = 'typeLogement';
    return $params;
}
add_filter('query_vars', 'MonTheme_query_vars');

add_action('pre_get_posts', function (WP_Query $query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->get('post_type') === 'logement' && !empty(get_query_var('prix'))) {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => "MonTheme_caracteristiques_prix",
            'value' => get_query_var('prix'),
            'compare' => '==',
            'type' => 'NUMERIC'
        ];
        $query->set('meta_query', $meta_query);
    }
    if ($query->get('post_type') === 'logement' && !empty(get_query_var('surface'))) {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => "MonTheme_caracteristiques_surface",
            'value' => get_query_var('surface'),
            'compare' => '>=',
            'type' => 'NUMERIC'
        ];
        $query->set('meta_query', $meta_query);
    }
    if (($query->is_tax() && !empty(get_query_var('prix'))) || ($query->is_tax() && !empty(get_query_var('prix')) && empty(get_query_var('surface')))) {
        echo "dddddddddd";
        $terms = get_terms(['taxonomy' => 'type-Logement']);
        foreach ($terms as $term) {
            echo get_term_link($term);
        };

        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => "MonTheme_caracteristiques_prix",
            'value' => get_query_var('prix'),
            'compare' => '==',
            'type' => 'NUMERIC'
        ];
        $query->set('meta_query', $meta_query);
    }
    if ($query->is_tax() && !empty(get_query_var('surface'))) {

        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => "MonTheme_caracteristiques_surface",
            'value' => get_query_var('surface'),
            'compare' => '==',
            'type' => 'NUMERIC'
        ];
        $query->set('meta_query', $meta_query);
    }
    if (($query->is_tax() && !empty(get_query_var('ville')) && empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne')))) {

        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => "localisation",
            'field' => 'slug',
            'terms' => get_query_var('ville'),
            'operator' => 'IN'
        ];
        $query->set('tax_query', $tax_query);
    }
    if (($query->get('post_type') === 'logement' && !empty(get_query_var('ville')) && empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('typeLogement'))  && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('ville')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('typeLogement'))  && empty(get_query_var('nombreDePersonne')))) {

        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => "localisation",
            'field' => 'slug',
            'terms' => get_query_var('ville'),
            'operator' => 'IN'
        ];
        $query->set('tax_query', $tax_query);
    }
    if (($query->is_tax() && !empty(get_query_var('typeLogement')) && empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne')))) {

        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => "type-Logement",
            'field' => 'slug',
            'terms' => get_query_var('typeLogement'),
            'operator' => 'IN'
        ];
        $query->set('tax_query', $tax_query);
        var_dump(get_query_var('typeLogement'));
        echo "dededze";
    }
    if (($query->get('post_type') === 'logement' && !empty(get_query_var('typeLogement')) && empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && empty(get_query_var('prix')) && !empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && empty(get_query_var('ville')) && !empty(get_query_var('nombreDePersonne'))) || ($query->is_tax() && !empty(get_query_var('typeLogement')) && !empty(get_query_var('surface')) && !empty(get_query_var('prix')) && !empty(get_query_var('ville')) && empty(get_query_var('nombreDePersonne')))) {

        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => "type-Logement",
            'field' => 'slug',
            'terms' => get_query_var('typeLogement'),
            'operator' => 'IN'
        ];
        $query->set('tax_query', $tax_query);
        var_dump(get_query_var('typeLogement'));
        echo "dededze";
    }
});
