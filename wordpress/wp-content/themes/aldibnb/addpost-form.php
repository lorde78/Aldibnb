<form action="<?= admin_url('admin-post.php'); ?>" method="post">
    <label for="title" >Titre</label>
    <textarea for="title" name="title"></textarea>

    <label for="description" >Description</label>
    <textarea for="description" name="description"></textarea>

    <label for="localisation" >Localisation</label>
    <textarea for="localisation" name="localisation"></textarea>

    <label for="type" >Type de logement</label>
    <textarea for="type" name="type"></textarea>

    <label for="surface" >Surface</label>
    <textarea for="surface" name="surface"></textarea>

    <label for="caracteristiques" >Caractéristiques</label>
    <textarea for="caracteristiques" name="caracteristiques"></textarea>

    <label for="prix" >Prix</label>
    <textarea for="prix" name="prix"></textarea>

    <label for="txoccup" >Taux d'occupation</label>
    <textarea for="txoccup" name="txoccup"></textarea>

    <input type="hidden" name="action" value="addpost_form"/>
        <?php wp_referer_field(); ?>
    <input type="submit" value="Envoyer"/>
</form>

<?php var_dump($args_logement); ?> 