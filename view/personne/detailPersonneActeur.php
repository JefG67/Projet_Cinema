
<?php ob_start(); ?>

<p class="uk-label uk-label-warning">

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom Prenom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $acteur) { ?>
                <tr>
                    <td><?= $acteur["nomActeur"] ?></td>
                    <td><?= $acteur["sexe"] ?></td>
                    <td><?= $acteur["date_naissance"] ?></td>

                </tr>
        <?php } ?>
    </tbody>
</table>
<br><br><br>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ROLE</th>
            <th>Titre Film</th>
            <th>Date Sortie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requete2->fetchAll() as $detailActeur) { ?>
        
        <tr>
                <td><?= $detailActeur["nom_role"] ?></td>
                <td><?= $detailActeur["titre_film"] ?></td>
                <td><?= $detailActeur["annee_de_sortie"] ?></td>
            </tr>
        <?php } ?>

<?php

$titre = "Detail acteur";

$contenu = ob_get_clean(); 
require "view/template.php";

?>