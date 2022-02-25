<?php

function wphetic_theme_support() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'wphetic_theme_support');

function wphetic_stylesheets(){
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'wphetic_stylesheets');

