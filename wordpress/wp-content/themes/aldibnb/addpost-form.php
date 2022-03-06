<form method="post">
    <label for="title"></label>
    <textarea for="title"></textarea>
    <label for="description"></label>
    <textarea for="description"></textarea>
    <input type="hidden" name="action" value="addpost-form"/>
        <?php wp_referer_field(); ?>
    <input type="button" value="Envoyer"/>
</form>
