
<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete-> rowCount() ?> role</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Role</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $roleFilm) { ?>
                <tr>
                    <td><?= $roleFilm["nom_role"] ?></td>
                    
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "liste des roles";

$contenu = ob_get_clean(); 
require "view/template.php";

?>