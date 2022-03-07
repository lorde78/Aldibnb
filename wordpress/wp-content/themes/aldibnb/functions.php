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
* Ajouter nos propres metadonnées dans la base de donées
*/

require_once 'classes/Caracteristiques.php';
$caracteristiques = new Caracteristiques('aldibnb_caracteristiques');

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

//On crée nos taxonomies personnalisées: Type

function wpm_add_taxonomies()
{
    // Taxonomie Type

    $labels_types = array(
        'name'                       => _x('types', 'taxonomy general name'),
        'singular_name'              => _x('type', 'taxonomy singular name'),
        'search_items'               => __('Rechercher un type'),
        'popular_items'              => __('type populaire'),
        'all_items'                  => __('Tous les types'),
        'edit_item'                  => __('Editer un type'),
        'update_item'                => __('Mettre à jour un type'),
        'add_new_item'               => __('Ajouter un nouveau type'),
        'add_or_remove_items'        => __('Ajouter ou supprimer un type'),
        'choose_from_most_used'      => __('Choisir parmi les plus utilisés'),
        'not_found'                  => __('Pas de types trouvés'),
        'menu_name'                  => __('types'),
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

add_action('init', function () {
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