<?php

/**
 * Plugin Name: Logement Manager
 * Description: ajout du post type Logement + ajout de taxonomies , ajout et activation du nouveau rôle Logement Manager + listing.
 * Version: 1.0.0
 * Author: Amin, Basil
 */


if (!defined('ABSPATH')) {
    wp_die('Accès interdit');
}

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
            'edit_others_posts'      => "manage_logements",
            'delete_published_posts'      => "manage_logements",
            'delete_private_posts'      => "manage_logements",
            'edit_published_posts'      => "manage_logements",
            'delete_post'        => "manage_logements",
            'delete_others_post'        => "manage_logements",
            'edit_posts'         => "manage_logements",
            'publish_posts'      => "manage_logements",
            'read'                   => "manage_logements",
            'delete_posts'           => "manage_logements",
            'publish_post' => 'manage_logements',
            'moderate_comments' => 'manage_logements',
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

function add_custom_user_role() {
    add_role('logements_manager', 'Logements Manager', [
        'manage_logements' => true,
        'moderate_comments' => 1,
        'edit_genre' => true,
        'delete_genre' => true,
        'assign_genre' => true,
        'manage_logements' => true,
        'manage_logements' => true,
    ]);
}


register_activation_hook( __FILE__, 'add_custom_user_role' );

function remove_custom_user_role() {
    $admin = get_role('administrator');
	$admin->remove_cap('manage_logements');
	remove_role('logements_manager');
}
 
register_deactivation_hook( __FILE__, 'remove_custom_user_role' );



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