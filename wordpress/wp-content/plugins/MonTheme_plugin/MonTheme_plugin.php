<?php

/**
 * Plugin Name: Logement Manager
 * Description: ajout du post type Logement + ajout de taxonomies , ajout et activation du nouveau rôle Logement Manager.
 * Version: 1.0.0
 * Author: Amin, Basil, Eduardo
 */


if (!defined('ABSPATH')) {
    wp_die('Accès interdit');
}

//register_activation_hook(__FILE__, function () {
//         // La déclaration de nos Custom Post Types et Taxonomies ira ici
//     // CPT Logement


//         $labels = array(
//             'name' => 'Logement',
//             'all_items' => 'Tous les Logements',  // affiché dans le sous menu
//             'singular_name' => 'Logement',
//             'add_new_item' => 'Ajouter un Logement',
//             'edit_item' => 'Modifier le Logement',
//             'menu_name' => 'Logement'
//         );
//         $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'has_archive' => true,
//         'supports' => array('title', 'editor', 'thumbnail'),
//         'menu_position' => 5,
//         'menu_icon' => 'dashicons-admin-customizer',
//         'capabilities' => array(
//             'edit_post'      => "manage_logements",
//             'read_post'      => "manage_logements",
//             'delete_post'        => "manage_logements",
//             'edit_posts'         => "manage_logements",
//             'publish_posts'      => "manage_logements",
//             'read'                   => "manage_logements",
//             'delete_posts'           => "manage_logements",
//             'create_posts'           => "manage_logements",
//         ),
//     );
//     register_post_type('Logement', $args);
//     // Déclaration de la Taxonomie type de logement
//     $labels = array(
//         'name' => 'Type de Logements',
//         'new_item_name' => 'Nom du nouveau Logement',
//         'parent_item' => 'Type de Logement parent',
//     );
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'hierarchical' => true,
//     );
//     register_taxonomy('type-Logement', 'logement', $args);
//     // Déclaration de la Taxonomie Localisation
//     $labels = array(
//         'name' => 'localisation',
//         'new_item_name' => 'Nom de la nouvelle localisation',
//         'parent_item' => 'Type de Localisation parente',
//     );
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'show_in_rest' => true,
//         'hierarchical' => true,
//     );
//     register_taxonomy('localisation', 'logement', $args);
// }
// );

// register_deactivation_hook(__FILE__, function () {
    
// });
