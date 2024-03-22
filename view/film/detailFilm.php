
<?php ob_start(); ?>

<!-- <p class="uk-label uk-label-warning">Il y a <?= $requete-> rowCount() ?> films</p> -->

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>NOTE</th>
            <th>DUREE</th>
            <th>SYNOPSIS</th>
            <th>AFFICHE</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            $film = $requete->fetch(); { ?>
            
                <tr>
                    <td><?= $film["titre_film"] ?></td>
                    <td><?= $film["annee_de_sortie"] ?></td>
                    <td><?= $film["note_film"] ?></td>
                    <td><?= $film["dure_film"] ?></td>
                    <td><?= $film["synopsis_film"] ?></td>
                    <td><?= $film["affiche_film"] ?></td>
                    
                </tr>
                
        <?php } ?>
    </tbody>
</table>
<br><br><br>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ROLE</th>
            <th>ACTEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requete2->fetchAll() as $listeRole) { ?>
        
        <tr>
                <td><?= $listeRole["nomRoleFilm"] ?></td>
                <td><?= $listeRole["nActeur"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br><br><br>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>genreFilm</th>
            
            </tr>
        </tr>
    </thead> 
<tbody>
<?php foreach ($requete3->fetchAll() as $genrefilm): ?>
        <tr>
            <td><?= $genrefilm["genre"]; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>           

<?php

$titre = "detailFilm";

$contenu = ob_get_clean(); 
require "view/template.php";

?>

