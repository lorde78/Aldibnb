<form action="<?= admin_url('admin-post.php'); ?>" method="post">
    <label for="title" >Titre</label>
    <textarea for="title" name="title"></textarea>

    <label for="description" >Description</label>
    <textarea for="description" name="description"></textarea>

    <input type="hidden" name="action" value="addpost_form"/>
        <?php wp_referer_field(); ?>
    <input type="submit" value="Envoyer"/>
</form>