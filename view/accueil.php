<?php ob_start(); ?>


<a href="index.php?action=listFilm"> Liste film </a><br>
<a href="index.php?action=listActeur"> Liste Acteur</a><br>
<a href="index.php?action=listRealisateur"> Liste Realisateur</a><br>
<a href="index.php?action=listGenre"> Liste des genres</a><br>
<a href="index.php?action=listRole"> Liste des role</a><br>
<a href="index.php?action=detailFilm"> detailFilm 1</a><br>

<?php

$titre = "Accueil";
$contenu = ob_get_clean(); 
require "view/template.php";

?>