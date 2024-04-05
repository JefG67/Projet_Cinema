<?php ob_start(); ?>


<a href="index.php?action=listFilm"> Liste film </a><br>
<a href="index.php?action=listActeur"> Liste Acteur</a><br>
<a href="index.php?action=listRealisateur"> Liste Realisateur</a><br>
<a href="index.php?action=listGenre"> Liste des genres</a><br>
<a href="index.php?action=listRole"> Liste des roles</a><br>
<a href="index.php?action=detailFilm&id=4"> detail Film </a><br>
<a href="index.php?action=detailRole&id=4"> detail Role </a><br>
<a href="index.php?action=detailGenre&id=1"> detail Genre </a><br>
<a href="index.php?action=detailActeur&id=1"> detail Acteur </a><br>
<a href="index.php?action=detailRealisateur&id=3"> detail Realisateur </a><br>
<a href="index.php?action=supprimerFilm&id=7"> Supprimer Film </a><br>
<a href="index.php?action=supprimerGenre&id=11"> Supprimer Genre </a><br>
<a href="index.php?action=supprimerRole&id=20"> Supprimer Role </a><br>
<a href="index.php?action=supprimerActeur&id=21"> Supprimer Acteur </a><br>
<a href="index.php?action=ajoutGenreFormulaire"> Ajout Genre </a><br>
<a href="index.php?action=ajoutRoleFormulaire"> Ajout d'un role </a><br>


<?php

$titre = "Accueil";
$contenu = ob_get_clean(); 
require "view/template.php";

?>