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

<form action="<?= admin_url('admin-post.php?action=publier'); ?>" name="publierform" method="POST">
    <div>
        <label for="inputTitre" class="form-label">Titre</label>
        <input type="text" class="form-control" name="Titre" id="inputTitre">
    </div>
    <div>
        <label for="inputEmail" class="form-label">Contenu</label>
        <input type="text" class="form-control" name="contenu" id="inputcontenu">
    </div>
    <div>
        <label for="ville-select">Choisir une ville:</label>
        <select name="ville" id="ville-select">
            <option value="">--Choisir une ville--</option>
            <?php foreach ($listeVille as $ville) : ?>
                <option value="<?= $ville ?>"><?= $ville ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="typeLogement-select">Choisir un typen de logement:</label>
        <select name="typeLogement" id="typeLogement-select">
            <option value="" selected="selected">--Choisir un type de logement--</option>
            <?php foreach ($listeTypeLogement as $logement) : ?>
                <option value="<?= $logement ?>"><?= $logement ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="inputPrix" class="form-label">Prix</label>
        <input type="number" class="form-control" name="Prix" id="inputPrix">
    </div>
    <div>
        <label for="inputDescription" class="form-label">Description</label>
        <input type="number" class="form-control" name="Description" id="inputDescription">
    </div>
    <div>
        <label for="inputSurface" class="form-label">Surface</label>
        <input type="number" class="form-control" name="Surface" id="inputSurface">
    </div>
    <div>
        <label for="inputNbrPersonne" class="form-label">Nombre de Personne</label>
        <input type="number" class="form-control" name="NbrPersonne" id="inputNbrPersonne">
    </div>
    <div>
        <label for="inputNbrDeChambre" class="form-label">Nombre de Chambre</label>
        <input type="text" class="form-control" name="NbrDeChambre" id="inputNbrDeChambre">
    </div>
    <div>
        <label for="myImageUpload" class="form-label">Mes images a charger</label>
        <input type="file" class="form-control" name="images" id="myImageUpload">
    </div>

    <input type="hidden" name="action" value="publier_form">
    <?php wp_referer_field(); ?>

    <input type="submit" class="submitButton" name="submit" value="Envoyer">
    <input type="hidden" name="task" value="register" />
</form>

<?php get_footer(); ?>