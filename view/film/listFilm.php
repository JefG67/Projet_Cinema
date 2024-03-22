
<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete-> rowCount() ?> films</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>AFFICHE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film) { ?>
                <tr>
                    <td><?= $film["titre_film"] ?></td>
                    <td><?= $film["annee_de_sortie"] ?></td>
                    <td><?= $film["affiche_film"] ?></td>

                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean(); 
require "view/template.php";

?>