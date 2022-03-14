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
//Formulaire poster logements
?>
<div class="container-inscription">
    <div class="sideLeft">
        <h2 class="textContainerInscription">Toujours la négociation avant l'habitation ! </h2>
        <div class="img_container">
            <img src="<?= get_template_directory_uri() . '/images/1200px-Pissevinnimes.JPG'  ?>" alt="">
            <div class="overlay"></div>
        </div>
    </div>
    <div class="sideRight">
        <form action="<?= admin_url('admin-post.php?action=publier'); ?>" name="publierform" method="POST">

            <div class="row">

                <label for="inputTitre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="Titre" id="inputTitre">
                <label for="inputEmail" class="form-label">Contenu</label>
                <input type="text" class="form-control" name="contenu" id="inputcontenu">
            </div>
            <div class="row">

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

            </div>
            <div class="row">

                <label for="inputPrix" class="form-label">Prix</label>
                <input type="number" class="form-control" name="Prix" id="inputPrix">
                <label for="inputSurface" class="form-label">Surface</label>
                <input type="number" class="form-control" name="Surface" id="inputSurface">
            </div>


            <div class="row">

                <label for="inputNbrPersonne" class="form-label">Nombre de Personne</label>
                <input type="number" class="form-control" name="NbrPersonne" id="inputNbrPersonne">

                <label for="inputNbrDeChambre" class="form-label">Nombre de Chambre</label>
                <input type="number" class="form-control" name="NbrDeChambre" id="inputNbrDeChambre">
            </div>
            <div class="row">

                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" class="form-control" name="Description" id="inputDescription">
            </div>



            <label for="myImageUpload" class="form-label">Mes images a charger</label>
            <input type="file" class="form-control" name="'my_image_upload" id="myImageUpload">
            <?php wp_nonce_field('my_image_upload', 'my_image_upload_nonce'); ?>
            <?php wp_referer_field(); ?>


            <input type="hidden" name="action" value="publier_form">

            <input type="submit" class="submitButton" name="submit" value="Envoyer">
            <input type="hidden" name="task" value="register" />
        </form>
    </div>
</div>



<?php get_footer(); ?>