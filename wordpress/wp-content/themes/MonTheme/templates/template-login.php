<?php
/*
Template Name: Page de connexion
*/

get_header();
?>

<?php
//Formulaire de connexion
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
} else { ?>
    <div class="container-connexion">
        <div class="sideLeft">
            <h2 class="textContainerConnexion">Le choix, sans l'embarras ! </h2>
            <div class="img_container">
                <img src="<?= get_template_directory_uri() . '/images/1200px-Pissevinnimes.JPG'  ?>" alt="">
                <div class="overlay"></div>

            </div>
        </div>
        <div class="sideRight">
        <h2 class="titrePageConnexion">Connectez-vous !</h2>

            <form action="<?= home_url('wp-login.php'); ?>" name="loginform" method="POST">

                <label for="inputEmail" class="form-label"> Email ou identifiant</label>
                <input type="text" class="form-control" name="log" id="inputEmail">

                <label for="inputPassword" class="form-label"> Password</label>
                <input type="password" class="form-control" name="pwd" id="inputPassword">
                <div class="checkboxLogin">
                    <label for="check" class="form-label"> Se souvenir</label>
                    <input type="checkbox" class="form-control-checkbox" id="check" name="rememberme" >
                </div>


                <input type="submit" class="submitButton" name="wp-submit" value="Se connecter">

                <input type="hidden" name="redirect_to" value="<?= home_url(); ?>">

            </form>
        </div>
    </div>
<?php  }
get_footer() ?>