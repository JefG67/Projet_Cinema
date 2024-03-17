<?php ob_start(); ?>


<a href="index.php?action=listFilm"> Liste film </a><br>
<a href="index.php?action=listActeur"> Liste Acteur</a>

<?php

$titre = "Accueil";
$contenu = ob_get_clean(); 
require "view/template.php";

?>