<?php
session_start();

use Controller\CinemaController;
use Controller\FilmController;
use Controller\GenreController; 
use Controller\RoleController;
use Controller\PersonneController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});    
    
$ctlrCinema = new CinemaController();
$ctrlFilm = new FilmController();
$ctrlGenre = new GenreController();
$ctrlRole = new RoleController();
$ctrlPersonne = new PersonneController();
  

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {

        //list
        case "listFilm": $ctrlFilm->listFilm(); break;
        case "listActeur": $ctrlPersonne->listActeur(); break;
        case "listRealisateur": $ctrlPersonne->listRealisateur(); break;
        case "listGenre": $ctrlGenre->listGenre(); break;
        case "listRole": $ctrlRole->listRole(); break;

        //detail
        case "detailFilm": $ctrlFilm->detailFilm($id); break;
        case "detailRole": $ctrlRole->detailRole($id); break;
        case "detailGenre": $ctrlGenre->detailGenre($id); break;
        case "detailActeur": $ctrlPersonne->detailActeur($id); break;
        case "detailRealisateur": $ctrlPersonne->detailRealisateur($id); break;

        
        
        //supprimer
        case "supprimerFilm" :$ctrlFilm->supprimerFilm($id); break;
        case "supprimerGenre" : $ctrlGenre->supprimerGenre($id); break;
        case "supprimerRole" : $ctrlRole->supprimerRole($id); break;
        case "supprimerActeur" : $ctrlPersonne->supprimerActeur($id); break;
        
        //ajout
        case "ajoutGenre" : $ctrlGenre->ajoutGenre(); break;
        case "ajoutGenreFormulaire" : $ctrlGenre->ajoutGenreFormulaire(); break;
        case "ajoutRole" : $ctrlRole->ajoutRole(); break;
        case "ajoutRoleFormulaire" : $ctrlRole->ajoutRoleFormulaire(); break;
        case "ajoutPersonne" : $ctrlPersonne->ajoutPersonne(); break;
        case "ajoutPersonneFormulaire" : $ctrlPersonne->ajoutPersonneFormulaire(); break;
        case "ajoutFilmFormulaire" : $ctrlFilm->ajoutFilm(); break;
        
    }
} else {
    $ctlrCinema->accueil();
}  

?>