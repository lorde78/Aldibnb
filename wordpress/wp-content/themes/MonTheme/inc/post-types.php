<?php

function MonTheme_register_post_types()
{
    // La déclaration de nos Custom Post Types et Taxonomies ira ici
    // CPT Logement
    $labels = array(
        'name' => 'Logement',
        'all_items' => 'Tous les Logements',  // affiché dans le sous menu
        'singular_name' => 'Logement',
        'add_new_item' => 'Ajouter un Logement',
        'edit_item' => 'Modifier le Logement',
        'menu_name' => 'Logement'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'capabilities' => array(
            'edit_post' => 'manage_logements',
            'read_post' => 'manage_logements',
            'delete_post' => 'manage_logements',
            'publish_post' => 'manage_logements',
        )
    );

    register_post_type('Logement', $args);

    // Déclaration de la Taxonomie type de logement
    $labels = array(
        'name' => 'Type de Logements',
        'new_item_name' => 'Nom du nouveau Logement',
        'parent_item' => 'Type de Logement parent',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    );

    register_taxonomy('type-Logement', 'logement', $args);

    // Déclaration de la Taxonomie Localisation
    $labels = array(
        'name' => 'localisation',
        'new_item_name' => 'Nom de la nouvelle localisation',
        'parent_item' => 'Type de Localisation parente',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    );

    register_taxonomy('localisation', 'logement', $args);
}

add_action('init', 'MonTheme_register_post_types');
