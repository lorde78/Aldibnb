<?php


//voir apres avec l'ajout personalisé du rôle custom post 

//add_action('after_setup_theme', 'remove_admin_bar');
//function remove_admin_bar() {
//    if (!current_user_can('subscriber') && !is_admin()) {
//        show_admin_bar(false);
//    }
//}


//Inscription

$listeConnexion = add_action('admin_post_inscription_form', function () {
    $password = $_POST['password'];
    $identifiant = $_POST['identifiant'];
    $email = $_POST['email'];
    echo "yyyyyyyyyyyyyyyyyyyyyyy";

    wp_redirect( $_POST['_wp_http_referer'] . "?password" . $password . "?identifiant" . $identifiant . "?email" . $email);
    $let = [$password,$identifiant,$email];

    var_dump($let);
    $user_id = wp_insert_user( array(
        'user_login' => $identifiant,
        'user_pass' => $password,
        'user_email' => $email,
        //'first_name' => 'Jasne',
        //'last_name' => 'Does',
        //'display_name' => 'Jane Doe',
        'role' => 'editor'
      ));
    
});
//wp_create_user( 'johndoe', 'passwordgoeshere', 'john.doe@example.com' );

/**
 * Modfier les rôles de l'admin quand on est sur le thème
 */

add_action('init', function() {
    $admin = get_role('administrator');
    $admin->add_cap('manage_logements');
});

/**
 * Ajout du rôle Logement Manager quand on est sur le thème
 */

add_action('init', function() {
add_role('logement_manager', 'Logement Manager', [
    'read' => true,
    'edit' => true,
    'manage_logements' => true,
]);
});

/**
 * Suppresion du rôle quand on quitte le theme
 */

 //add_action('switch_theme', function() {
 //   $admin = get_role('administrator');
 //   $admin->remove_cap('manage_logements');
 //   remove_role('logement_manager');
 //});