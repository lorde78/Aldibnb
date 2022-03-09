<?php


//voir apres avec l'ajout personalisé du rôle custom post 

//add_action('after_setup_theme', 'remove_admin_bar');
//function remove_admin_bar() {
//    if (!current_user_can('subscriber') && !is_admin()) {
//        show_admin_bar(false);
//    }
//}


//Inscription

add_action('admin_post_inscription_login', function () {
    $password = $_POST['password'];
    $identifiant = $_POST['identifiant'];
    $email = $_POST['email'];

    //wp_redirect( $_POST['_wp_http_referer'] . "?password" . $password . "?identifiant" . $identifiant . "?email" . $email);
    //exit();

    $userdata = [
        'user_pass' => $password, 
        'user_login' => $identifiant,
        'user_email' => $email, 
        'role' => 'administrator', 
    ];

    wp_insert_user( wp_slash($userdata) );
    
});


/**
 * Modfier les rôles de l'admin quand on est sur le thème
 */

add_action('after_switch_theme', function() {
    $admin = get_role('administrator');
    $admin->add_cap('manage_logements');
});

/**
 * Ajout du rôle Logement Manager quand on est sur le thème
 */

add_action('after_switch_theme', function() {
add_role('logement_manager', 'Logement Manager', [
    'read' => true,
    'manage_logements' => true,
]);
});

/**
 * Suppresion du rôle quand on quitte le theme
 */

 add_action('switch_theme', function() {
    $admin = get_role('administrator');
    $admin->remove_cap('manage_logements');
    remove_role('logement_manager');
 });