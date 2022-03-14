<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo">
        </a>

        <nav class="maNavbarHeader">

            <?php
            if (!is_user_logged_in()) {

                wp_nav_menu(
                    array(
                        'theme_location' => 'main',
                        'container' => false, // afin d'éviter d'avoir une div autour 
                        'menu_class'     => 'menu-header',
                    )
                );
            } else {

                wp_nav_menu(
                    array(
                        'theme_location' => 'main_logged',
                        'container' => false, // afin d'éviter d'avoir une div autour 
                        'menu_class'     => 'menu-headerLogged',
                    )
                );
            }
            ?>
            
        </nav>
        <div class="user">
            <?php
            if (current_user_can('editor') || current_user_can('administrator') ): ?>
                <p>Bienvenue  <strong><?global $current_user; wp_get_current_user(); echo $current_user->user_login ?> </strong></p>
            <?php endif;?>
            </div>
    </header>

    <?php wp_body_open(); ?>

