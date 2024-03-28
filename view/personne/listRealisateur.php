
<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete-> rowCount() ?> Realisateur</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $realisateur) { ?>
                <tr>
                    <td><?= $realisateur["nom"] ?></td>
                    <td><?= $realisateur["prenom"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Realisateur";
$titre_secondaire = "Liste des Realisateur";
$contenu = ob_get_clean(); 
require "view/template.php";

?>