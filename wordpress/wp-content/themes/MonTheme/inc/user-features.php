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

    wp_redirect($_POST['_wp_http_referer'] . "?password" . $password . "?identifiant" . $identifiant . "?email" . $email);
    $let = [$password, $identifiant, $email];

    var_dump($let);
    $user_id = wp_insert_user(array(
        'user_login' => $identifiant,
        'user_pass' => $password,
        'user_email' => $email,
        'role' => 'editor'
    ));
});
//wp_create_user( 'johndoe', 'passwordgoeshere', 'john.doe@example.com' );


//Envoyer le formulaire 
$listePublicationPost = add_action('admin_post_publier_form', function () {
    $titre = $_POST['Titre'];
    $contenu = $_POST['contenu'];
    $ville = $_POST['ville'];
    $typeLogement = $_POST['typeLogement'];
    $prix = $_POST['Prix'];
    $description = $_POST['Description'];
    $surface = $_POST['NbrPersonne'];
    $images = $_POST['images'];


    $post_args = array(
        'post_type' => 'logement',
        'post_content' => $contenu,
        'post_title' => $titre,
        'post_status' => 'pending',
        'post_author' => get_current_user_id(),
        //'comment_status' => 'closed',
        'meta_input' => array(
            'prix' => $prix,
            'typeLogement' => $typeLogement,
            'ville' => $ville,
            'description' => $description,
            'surface' => $surface,
        )
    );

    wp_insert_post($post_args);
    


    //wp_redirect($_POST['_wp_http_referer'] . "?Titre" . $titre . "?contenu" . $contenu . "?Prix" . $prix);
});


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
        'manage_logements' => true,
        'edit_genre' => true,
        'delete_genre' => true,
        'assign_genre' => true,
        'manage_logements' => true,
        'manage_logements' => true,
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
