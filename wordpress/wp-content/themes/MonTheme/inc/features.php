<?php

function MonTheme_remove_menu_pages()
{
    remove_menu_page('tools.php');
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'MonTheme_remove_menu_pages');

//images 
add_theme_support('post-thumbnails');

// Définir la taille des images mises en avant
set_post_thumbnail_size(2000, 400, true);

// Définir d'autres tailles d'images
add_image_size('products', 800, 600, false);
add_image_size('square', 256, 256, false);
