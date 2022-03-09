<?php
	
    // Configuration du thème
	require_once get_template_directory() . '/inc/config.php';

	// Types de publication et taxonomies
	require_once get_template_directory() . '/inc/post-types.php';

	// Fonctionnalités
	require_once get_template_directory() . '/inc/features.php';

    // Fonctionnalités user
	require_once get_template_directory() . '/inc/user-features.php';

    register_nav_menus( array(
        'main' => 'Menu Principal',
        'footer' => 'Bas de page',
    ) );

    register_sidebar( array(
        'id' => 'nomSideBarFiltre',
        'name' => 'nomSideBarFiltre',
        'before_widget'  => '<div class="site__sidebar__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<p class="site__sidebar__widget__title">',
        'after_title' => '</p>',
    ) );


    /*
    * Ajouter nos propres metadonnées dans la base de donées
    */

    require_once 'classes/Caracteristiques.php';
    $caracteristiques = new Caracteristiques('MonTheme_caracteristiques');

    /*add_filter('query_vars', function($params) {
        $params[] = 'prix';
        return $params;
    });*/
    
    function MonTheme_query_vars ($params) {
        $params[] = 'prix';
        $params[] = 'surface';
        $params[] = 'nbrChambre';
        return $params;
    }
    add_filter('query_vars', 'MonTheme_query_vars');

    add_action('pre_get_posts', function(WP_Query $query) {
        if (is_admin() || !$query->is_main_query()) {
            return;
        }
        if ($query->get('post_type') === 'logement' && !empty(get_query_var('prix')))  {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => "MonTheme_caracteristiques_prix",
                'value' => get_query_var('prix'),
                'compare' => '<=',
                'type' => 'NUMERIC'
            ];
            $query->set('meta_query', $meta_query);
        }
        if ($query->get('post_type') === 'logement' && !empty(get_query_var('surface')))  {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => "MonTheme_caracteristiques_surface",
                'value' => get_query_var('surface'),
                'compare' => '<=',
                'type' => 'NUMERIC'
            ];
            $query->set('meta_query', $meta_query);
        }
    });
    
    

