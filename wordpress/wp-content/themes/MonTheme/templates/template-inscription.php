<?php
/*
Template Name: Page Inscription
*/
get_header();
?>

<?php
//Formulaire d'inscription 
if (is_user_logged_in()) {
    wp_redirect(home_url());
} else { ?>
    <div class="container-inscription">
        <div class="sideLeft">
            <h2 class="textContainerInscription">Toujours la négociation avant l'habitation  ! </h2>
            <div class="img_container">
                <img src="<?= get_template_directory_uri() . '/images/1200px-Pissevinnimes.JPG'  ?>" alt="">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="sideRight">
            <h2 class="titrePageInscription">Inscrivez-vous !</h2>
            <form action="<?= admin_url('admin-post.php?action=inscription'); ?>" name="inscriptionform" method="POST">
                <label for="inputIdentifiant" class="form-label"> Identifiant</label>
                <input type="text" class="form-control" name="identifiant" id="inputIdentifiant">

                <label for="inputEmail" class="form-label"> Email</label>
                <input type="text" class="form-control" name="email" id="inputEmail">

                <label for="inputPassword" class="form-label"> Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword">

                <input type="hidden" name="action" value="inscription_form">

                <input type="submit" class="submitButton" name="submit" value="Se connecter">
                <input type="hidden" name="task" value="register" />

            </form>
        </div>

    </div>
<?php  }
get_footer(); ?>