<?php ob_start(); ?>

<p class="uk-label uk-label-warning">

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE film</th>
            <th>GENRE FILM</th>
            <th>DATE DE SORTIE</th>
            <th>AFFICHE</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $genre = $requete->fetch(); { ?>
                <tr>
                    <td><?= $genre["titre_film"] ?></td>
                    <td><?= $genre["libelle"] ?></td>
                    <td><?= $genre["dateDeSortie"] ?></td>
                    <td><?= $genre["affiche_film"] ?></td>

                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "DetailGenre";
$contenu = ob_get_clean(); 
require "view/template.php";
