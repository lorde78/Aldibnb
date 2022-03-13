<?php
/*
Template Name: Formulaire Post Logement
*/
?>
<?php
$terms = get_terms(['taxonomy' => 'localisation']);
foreach ($terms as $term) {
    $listeVille[] = $term->name;
};

$terms1 = get_terms(['taxonomy' => 'type-Logement']);
foreach ($terms1 as $term) {
    $listeTypeLogement[] = $term->name;
};
get_header();
?>
<?php
//Formulaire d'inscription 
?>

<form action="<?= admin_url('admin-post.php?action=publier'); ?>" name="publierform" method="POST">
 
        <label for="inputTitre" class="form-label">Titre</label>
        <input type="text" class="form-control" name="Titre" id="inputTitre">

        <label for="inputEmail" class="form-label">Contenu</label>
        <input type="text" class="form-control" name="contenu" id="inputcontenu">

        <label for="ville-select">Choisir une ville:</label>
        <select name="ville" id="ville-select">
            <option value="">--Choisir une ville--</option>
            <?php foreach ($listeVille as $ville) : ?>
                <option value="<?= $ville ?>"><?= $ville ?></option>
            <?php endforeach; ?>
        </select>
 
        <label for="typeLogement-select">Choisir un typen de logement:</label>
        <select name="typeLogement" id="typeLogement-select">
            <option value="" selected="selected">--Choisir un type de logement--</option>
            <?php foreach ($listeTypeLogement as $logement) : ?>
                <option value="<?= $logement ?>"><?= $logement ?></option>
            <?php endforeach; ?>
        </select>
 
        <label for="inputPrix" class="form-label">Prix</label>
        <input type="number" class="form-control" name="Prix" id="inputPrix">

        <label for="inputDescription" class="form-label">Description</label>
        <input type="text" class="form-control" name="Description" id="inputDescription">

        <label for="inputSurface" class="form-label">Surface</label>
        <input type="number" class="form-control" name="Surface" id="inputSurface">

        <label for="inputNbrPersonne" class="form-label">Nombre de Personne</label>
        <input type="number" class="form-control" name="NbrPersonne" id="inputNbrPersonne">

        <label for="inputNbrDeChambre" class="form-label">Nombre de Chambre</label>
        <input type="number" class="form-control" name="NbrDeChambre" id="inputNbrDeChambre">

        <label for="myImageUpload" class="form-label">Mes images a charger</label>
        <input type="file" class="form-control" name="'my_image_upload" id="myImageUpload">
        <?php wp_nonce_field('my_image_upload', 'my_image_upload_nonce'); ?>
        <?php wp_referer_field(); ?>


    <input type="hidden" name="action" value="publier_form">

    <input type="submit" class="submitButton" name="submit" value="Envoyer">
    <input type="hidden" name="task" value="register" />
</form>



<?php get_footer(); ?>