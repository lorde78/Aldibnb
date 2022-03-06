<?php

function wphetic_theme_support()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'wphetic_theme_support');

function wphetic_stylesheets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'wphetic_stylesheets');

/*
* Ajouter nos propres metadonnées
*/

function aldibnb_meta_box(){
    add_meta_box(
        'descriptions',
        'La description du logement',
        'aldibnb_metabox_render',
        'post',
        'side'
    );
}

add_action('add_meta_boxes', 'aldibnb_meta_box');

/*
* Gestion des posts
*/

add_action('admin_post_addpost_form', function () {
    /*$title = $_POST['title'];
    $description = $_POST['description'];
    $localisation = $_POST['localisation'];
    $type = $_POST['type'];
    $surface = $_POST['surface'];
    $caracteristiques = $_POST['caracteristiques'];
    $prix = $_POST['prix'];
    $txoccup = $_POST['txoccup'];
    wp_redirect($_POST['_wp_http_referer'] . "?title=" . $title . "?description=" . $description . "?localisation=" . $localisation . "?type=" . $type . "?surface=" . $surface . "?caracteristiques=" . $caracteristiques . "?prix=" . $prix . "?=txoccup" . $txoccup);
    exit();
    */
    $args_logement = array(
        'post_title'    => $_POST['title'],
        'post_content'  => $_POST['description'],
        'post_status'   => 'publish',
        'post_type' => 'logements',
        'post_author'   => get_current_user_id(),
        'meta_input' => array(
            'prixlogements' => $_POST['prix'],
            'surfaces' => $_POST['surface'],
        )
      );

      wp_insert_post( $args_logement );
});

/*
* Créer post "Logements" sur wordpress admin
*/

function wpm_custom_post_type()
{

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(

        'name'                => _x('Logements', 'Post Type General Name'),
        'singular_name'       => _x('Logement', 'Post Type Singular Name'),
        'menu_name'           => __('Logements'),
        'view_item'           => __('Voir les Logements'),
        'all_items'           => __('Tous les Logements'),
        'add_new_item'        => __('Ajouter un Logement'),
        'add_new'             => __('Ajouter un nouveau de Logemnt'),
        'edit_item'           => __('Editer le Logement'),
        'update_item'         => __('Modifier le Logement'),
        'search_items'        => __('Rechercher un Logement'),
        'not_found'           => __('Non trouvé'),
        'not_found_in_trash'  => __('Non trouvé dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label'               => __('logement'),
        'description'         => __('Tous les logements'),
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-home',
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        /*
        * Différentes options supplémentaires
        */
        'show_in_rest' => true,
        'hierarchical'        => false,
        'public'              => true,
        'publicly_queryable' => true,
        'has_archive'         => false,
        'rewrite'              => array('slug' => 'logements'),
        'menu_position' => 3,
        'capabilities' => array(
            'edit_post'      => "manage_logements",
            'read_post'      => "manage_logements",
            'delete_post'        => "manage_logements",
            'edit_posts'         => "manage_logements",
            'edit_others_posts'  => "manage_logements",
            'publish_posts'      => "manage_logements",
            'read_private_posts'     => "manage_logements",
            'read'                   => "manage_logements",
            'delete_posts'           => "manage_logements",
            'delete_private_posts'   => "manage_logements",
            'delete_published_posts' => "manage_logements",
            'delete_others_posts'    => "manage_logements",
            'edit_private_posts'     => "manage_logements",
            'edit_published_posts'   => "manage_logements",
            'create_posts'           => "manage_logements",
        ),

    );

    // On enregistre notre custom post type qu'on nomme ici "logements" et ses arguments
    register_post_type('logements', $args);
}

/*
* Gestion d'ajout de posts par le front
*/

add_action('init', 'wpm_custom_post_type', 0);

add_action('init', 'wpm_add_taxonomies', 0);

//On crée nos taxonomies personnalisées: Localisation, Type, Surface, TxOccupation, Prix, Disponibilité, Caractéristiques

function wpm_add_taxonomies()
{

    // Taxonomie Localisation

    // On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
    $labels_localisations = array(
        'name'                          => _x('Localisations', 'taxonomy general name'),
        'singular_name'                 => _x('Localisation', 'taxonomy singular name'),
        'search_items'                  => __('Chercher une localisation'),
        'all_items'                        => __('Toutes les localisation'),
        'edit_item'                     => __('Editer la localisation'),
        'update_item'                   => __('Mettre à jour la localisation'),
        'add_new_item'                     => __('Ajouter une nouvelle localisation'),
        'new_item_name'                 => __('Valeur de la nouvelle localisation'),
        'separate_items_with_commas'    => __('Séparer les réalisateurs avec une virgule'),
        'menu_name'         => __('Localisation'),
    );

    $args_localisations = array(
        // Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
        'hierarchical'      => false,
        'labels'            => $labels_localisations,
        'show_ui'           => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'localisation'),
    );

    register_taxonomy('localisations', 'logements', $args_localisations);

    // Taxonomie Type

    $labels_types = array(
        'name'                       => _x('Types', 'taxonomy general name'),
        'singular_name'              => _x('Type', 'taxonomy singular name'),
        'search_items'               => __('Rechercher un type'),
        'popular_items'              => __('Type populaire'),
        'all_items'                  => __('Tous les types'),
        'edit_item'                  => __('Editer un type'),
        'update_item'                => __('Mettre à jour un type'),
        'add_new_item'               => __('Ajouter un nouveau type'),
        'add_or_remove_items'        => __('Ajouter ou supprimer un type'),
        'choose_from_most_used'      => __('Choisir parmi les plus utilisés'),
        'not_found'                  => __('Pas de types trouvés'),
        'menu_name'                  => __('Types'),
    );

    $args_types = array(
        'hierarchical'          => false,
        'labels'                => $labels_types,
        'show_ui'               => true,
        'show_in_rest'            => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'realisateurs'),
    );

    register_taxonomy('types', 'logements', $args_types);

    // Taxonomy Surface

    $labels_surfaces = array(
        'name'                       => _x('Surfaces', 'taxonomy general name'),
        'singular_name'              => _x('Surface', 'taxonomy singular name'),
        'search_items'               => __('Rechercher une surface'),
        'popular_items'              => __('Surface populaire'),
        'all_items'                  => __('Toutes les surfaces'),
        'edit_item'                  => __('Editer une surface'),
        'update_item'                => __('Mettre à jour une surface'),
        'add_new_item'               => __('Ajouter un nouvelle surface'),
        'add_or_remove_items'        => __('Ajouter ou supprimer une surface'),
        'choose_from_most_used'      => __('Choisir parmi les surfaces plus utilisés'),
        'not_found'                  => __('Pas de Surfaces trouvés'),
        'menu_name'                  => __('Surface'),
    );

    $args_surfaces = array(
        // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
        'hierarchical'          => true,
        'labels'                => $labels_surfaces,
        'show_ui'               => true,
        'show_in_rest'            => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'surfaces'),
    );

    register_taxonomy('surfaces', 'logements', $args_surfaces);


    // Caractéristiques de logements

    $labels_carac_logements = array(
        'name'                       => _x('Caractéristiques de logements', 'taxonomy general name'),
        'singular_name'              => _x('Caractéristique de logement', 'taxonomy singular name'),
        'search_items'               => __('Rechercher une caractéristiques'),
        'popular_items'              => __('Caractéristiques populaires'),
        'all_items'                  => __('Toutes les caractéristiques'),
        'edit_item'                  => __('Editer une caractéristique'),
        'update_item'                => __('Mettre à jour une caractéristique'),
        'add_new_item'               => __('Ajouter une nouvelle caractéristique'),
        'new_item_name'              => __('Nom de la nouvelle caractéristique'),
        'add_or_remove_items'        => __('Ajouter ou supprimer une caractéristique'),
        'choose_from_most_used'      => __('Choisir parmi les caractéristiques les plus utilisées'),
        'not_found'                  => __('Pas de caractéristiques trouvées'),
        'menu_name'                  => __('Caractéristiques de logements'),
    );

    $args_carac_logements = array(
        // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
        'hierarchical'          => true,
        'labels'                => $labels_carac_logements,
        'show_ui'               => true,
        'show_in_rest'            => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'caractéristiqueslogements'),
    );

    register_taxonomy('caractéristiqueslogements', 'logements', $args_carac_logements);

    // Prix

    $labels_prix_logements = array(
        'name'                       => _x('Prix de logements', 'taxonomy general name'),
        'singular_name'              => _x('Prix de logement', 'taxonomy singular name'),
        'search_items'               => __('Rechercher un prix'),
        'popular_items'              => __('Prix populaires'),
        'all_items'                  => __('Toutes les prix'),
        'edit_item'                  => __('Editer une prix'),
        'update_item'                => __('Mettre à jour une prix'),
        'add_new_item'               => __('Ajouter un nouveau prix'),
        'new_item_name'              => __('Nom de la nouveau prix'),
        'add_or_remove_items'        => __('Ajouter ou supprimer une prix'),
        'choose_from_most_used'      => __('Choisir parmi les prix les plus utilisées'),
        'not_found'                  => __('Pas de prix trouvées'),
        'menu_name'                  => __('Prix de logements'),
    );

    $args_prix_logements = array(
        // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
        'hierarchical'          => false,
        'labels'                => $labels_prix_logements,
        'show_ui'               => true,
        'show_in_rest'            => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'prixlogements'),
    );

    register_taxonomy('prixlogements', 'logements', $args_prix_logements);


    // Taux de nombre de personne occupation

    $labels_txoccupation_logements = array(
        'name'                       => _x('Txoccupation de logements', 'taxonomy general name'),
        'singular_name'              => _x('Txoccupation de logement', 'taxonomy singular name'),
        'search_items'               => __('Rechercher une Txoccupation'),
        'popular_items'              => __('Txoccupation populaires'),
        'all_items'                  => __('Toutes les Txoccupation'),
        'edit_item'                  => __('Editer une Txoccupation'),
        'update_item'                => __('Mettre à jour une Txoccupation'),
        'add_new_item'               => __('Ajouter une nouvelle Txoccupation'),
        'new_item_name'              => __('Nom de la nouvelle Txoccupation'),
        'add_or_remove_items'        => __('Ajouter ou supprimer une Txoccupation'),
        'choose_from_most_used'      => __('Choisir parmi les Txoccupation les plus utilisées'),
        'not_found'                  => __('Pas de Txoccupation trouvées'),
        'menu_name'                  => __('Txoccupation de logements'),
    );

    $args_txoccupation_logements = array(
        // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
        'hierarchical'          => true,
        'labels'                => $labels_txoccupation_logements,
        'show_ui'               => true,
        'show_in_rest'            => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'Txoccupationlogements'),
    );

    register_taxonomy('Txoccupationlogements', 'logements', $args_txoccupation_logements);
}

/*
* Gestion role admin
*/


//il inclus les custom post type dans la page d'acceuil
function wpc_cpt_in_home($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_home) {
            $query->set('post_type', array('post', 'property'));
        }
    }
}

add_action('pre_get_posts', 'wpc_cpt_in_home');


/**
 * Modifie le rôle de l'admin, quand on active le theme
 */

add_action('after_switch_theme', function () {
    $admin = get_role('administrator');
    $admin->add_cap('manage_logements');
});


/**
 * Ajout d'un nouveau rôle, quand on active le theme
 */

add_action('after_switch_theme', function () {
    add_role('logements_manager', 'Logements Manager', [
        'read' => true,
        'manage_logements' => true,
        'delete' => true,
        'edit' => true
    ]);
});

/**
 * Suppresion d'un nouveau rôle, quand on switch de theme
 */

add_action('switch_theme', function () {
    $admin = get_role('administrator');
    $admin->remove_cap('manage_logements');
    remove_role('logements_manager');
});