<?php ob_start(); ?>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM PRENOM</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            $realisateur = $requete->fetch(); { ?>
            
                <tr>
                    <td><?= $realisateur["nomRealisateur"] ?></td>
                    <td><?= $realisateur["sexe"] ?></td>
                    <td><?= $realisateur["date_naissance"] ?></td>
                                     
                </tr>
                
        <?php } ?>
    </tbody>
</table>    
    <br><br><br><br><br><br><br>   
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE FILM</th>
            <th>ANNEE DE SORTIE</th>
            
            
        </tr>
    </thead>
    <tbody>
            <?php foreach ($requete2->fetchAll() as $film) { ?>
            
                <tr>
                    <td><?= $film["titre_film"] ?></td>
                    <td><?= $film["annee_de_sortie"] ?></td>
                   
                                     
                </tr>
                
        <?php } ?>
    </tbody>
</table>    