<?php
$terms = get_terms(['taxonomy' => 'localisation']);
foreach ($terms as $term) {
    $listeVille[] = $term->name;
};

$terms1 = get_terms(['taxonomy' => 'type-Logement']);
foreach ($terms1 as $term) {
    $listeTypeLogement[] = $term->name;
};

?>

<form name="searchFilter" class="searchFilter" method="GET">
    <div>
        <label for="inputEmail" class="form-label"> Prix</label>
        <input type="number" class="input-prix" name="prix" id="prix">

        <label for="inputPassword" class="form-label"> Surface </label>
        <input type="number" class="form-control" name="surface" id="inputSurface">

        <label for="inputnombreDePersonne" class="form-label"> Nombre de personne </label>
        <input type="number" class="form-control" name="nombreDePersonne" id="inputnombreDePersonne">

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


        <input type="submit" class="submitButton" value="Filtrer">

</form>