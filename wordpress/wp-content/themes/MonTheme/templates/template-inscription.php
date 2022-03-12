<?php
/*
Template Name: Page Inscription
*/
?>

<?php

if (is_user_logged_in()) {
    wp_redirect(home_url());
} else { ?>
    <form action="<?= admin_url('admin-post.php?action=inscription'); ?>" name="inscriptionform" method="POST">
        <label for="inputIdentifiant" class="form-label"> Identifiant</label>
        <input type="text" class="form-control" name="identifiant" id="inputIdentifiant">

        <label for="inputEmail" class="form-label"> Email</label>
        <input type="text" class="form-control" name="email" id="inputEmail">

        <label for="inputPassword" class="form-label"> Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword">


        <input type="hidden" name="action" value="inscription_form">
        <?php wp_referer_field(); ?>

        <input type="submit" class="submitButton" name="submit" value="Se connecter">
        <input type="hidden" name="task" value="register" />

    </form>

<?php  } ?>