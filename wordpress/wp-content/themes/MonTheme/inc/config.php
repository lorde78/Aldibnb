<?php

// Ajouter la prise en charge des images mises en avant
// add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
// add_theme_support('title-tag');


function MonTheme_register_assets()
{

    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer le JS
    wp_enqueue_script(
        'MonTheme',
        get_template_directory_uri() . '/js/script.js',
        array('jquery'),
        '1.0',
        true
    );

    // Déclarer style.css à la racine du thème
    wp_enqueue_style( 'style.css', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'MonTheme_register_assets');





function MonTheme_theme_support()
{
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');

    register_nav_menus(array(
        'main' => 'Menu Principal',
        'main_logged' => 'Menu Principal logged',
        'footer' => 'Bas de page',
    ));
}

add_action('init', 'MonTheme_theme_support');