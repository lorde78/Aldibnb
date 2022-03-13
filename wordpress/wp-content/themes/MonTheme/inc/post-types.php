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
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'capabilities' => array(
            'edit_post'      => "manage_logements",
            'read_post'      => "manage_logements",
            'read_private_posts'      => "manage_logements",
            'edit_others_postS'      => "manage_logements",
            'delete_published_posts'      => "manage_logements",
            'delete_post'        => "manage_logements",
            'edit_posts'         => "manage_logements",
            'publish_posts'      => "manage_logements",
            'read'                   => "manage_logements",
            'delete_posts'           => "manage_logements",
            'publish_post' => 'manage_logements',
        ),
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
        'capabilities' => array(
            'manage_terms' => 'manage_logements',
            'edit_terms' => 'manage_logements',
            'delete_terms' => 'manage_logements',
            'assign_terms' => 'manage_logements',

        )
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
        'capabilities' => array(
            'manage_terms' => 'manage_logements',
            'edit_terms' => 'manage_logements',
            'delete_terms' => 'manage_logements',
            'assign_terms' => 'manage_logements',

        )
    );
    register_taxonomy('localisation', 'logement', $args);
}
add_action('init', 'MonTheme_register_post_types');

/**
 * Listing back office
 */

add_filter('manage_logement_posts_columns', function ($col) {
    return array(

        'cb' => $col['cb'],
        'title' => $col['title'],
        'image' => 'Image',
        'date' => $col['date'],
    );
});

add_action('manage_logement_posts_custom_column', function ($col, $post_id) {
    the_post_thumbnail('thumbnail', $post_id);
}, 10, 2);
