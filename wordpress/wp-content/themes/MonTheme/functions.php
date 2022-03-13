<?php

// Configuration du thème
require_once get_template_directory() . '/inc/config.php';

// Types de publication et taxonomies
require_once get_template_directory() . '/inc/post-types.php';

// Fonctionnalités
require_once get_template_directory() . '/inc/features.php';

// Fonctionnalités user
require_once get_template_directory() . '/inc/user-features.php';

register_nav_menus(array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
));

register_sidebar(array(
	'id' => 'nomSideBarFiltre',
	'name' => 'nomSideBarFiltre',
	'before_widget'  => '<div class="site__sidebar__widget %2$s">',
	'after_widget'  => '</div>',
	'before_title' => '<p class="site__sidebar__widget__title">',
	'after_title' => '</p>',
));



/*
* Ajouter nos propres metadonnées dans la base de donées
*/

require_once 'classes/Caracteristiques.php';
$caracteristiques = new Caracteristiques('MonTheme_caracteristiques');

/*add_filter('query_vars', function($params) {
	$params[] = 'prix';
	return $params;
});*/


// Fonctionnalités filtre
require_once get_template_directory() . '/inc/post-filtre.php';

// Pagination
function MonTheme_paginate_links(){

	echo'<nav class="paginate_container>';
	echo'<ul>';
	$pages = paginate_links(['type' => 'array']);
	foreach ($pages as $page){
		echo '<li class="paginate_number>';
		echo str_replace('page_numbers', 'page-link', $page);
		echo '</li>';
	}
	echo '</ul>';
	echo '</nav>';
	
}