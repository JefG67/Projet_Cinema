
<?php ob_start(); ?>

<p class="uk-label uk-label-warning">

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE film</th>
            <th>nomRole</th>
            <th>nomActeur</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $role = $requete->fetch(); { ?>
                <tr>
                    <td><?= $role["titreFilm"] ?></td>
                    <td><?= $role["nomRole"] ?></td>
                    <td><?= $role["nomActeur"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "DetailRole";
$contenu = ob_get_clean(); 
require "view/template.php";

?>
