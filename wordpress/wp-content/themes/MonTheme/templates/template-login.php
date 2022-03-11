<?php
/*
Template Name: Page de connexion
*/
?>

<?php
if (is_user_logged_in()) {
    wp_redirect( home_url() );
    exit;
} else { ?>
    
    <form action="<?= home_url('wp-login.php'); ?>" name="loginform" method="POST">
    <div>
        <label for="inputEmail" class="form-label"> Email address</label>
        <input type="text" class="form-control" name="log" id="inputEmail">
    </div>
    <div>
        <label for="inputPassword" class="form-label"> Password</label>
        <input type="password" class="form-control" name="pwd" id="inputPassword">
    </div>
    <div>
        <input type="checkbox" class="form-control" id="check" name="rememberme">
        <label for="check" class="form-label"> Se souvenir</label>
    </div>

    <input type="submit" class="submitButton" name="wp-submit" value="Se connecter">

    <input type="hidden" name="redirect_to" value="<?= home_url(); ?>">

</form>
<?php  } ?>