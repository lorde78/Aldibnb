<?php

function MonTheme_remove_menu_pages() {
	remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'MonTheme_remove_menu_pages' );

//images 

add_theme_support( 'post-thumbnails' );

// Définir la taille des images mises en avant
set_post_thumbnail_size( 2000, 400, true );

// Définir d'autres tailles d'images
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );

function MonTheme_register_post_types() {
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
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-customizer',
        'capabilities' => array(
            'edit_post' => 'manage_logements',
            'read_post' => 'manage_logements',
            'delete_post' => 'manage_logements',
            'publish_post' => 'manage_logements',
        )
    );

    register_post_type( 'Logement', $args );

    // Déclaration de la Taxonomie
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

    register_taxonomy( 'type-Logement', 'logement', $args );
    }
add_action( 'init', 'MonTheme_register_post_types' );