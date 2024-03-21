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

        case "listFilm": $ctlrCinema->listFilm(); break;
        case "listActeur": $ctlrCinema->listActeur(); break;
        case "listRealisateur": $ctlrCinema->listRealisateur(); break;
        case "listGenre": $ctlrCinema->listGenre(); break;
        case "listRole": $ctlrCinema->listRole(); break;
        case "detailFilm": $ctlrCinema->detailFilm($id); break;
        

        case "supprimerFilm" :$ctlrFilm->supprimerFilm($id); break;
        case "supprimerGenre" : $ctlrGenre->supprimerGenre($id); break;
        case "supprimerRole" : $ctrlRole->supprimerRole($id); break;
        case "supprimerActeur" : $ctrPersonne->supprimerActeur($id); break;
        
    }
} else {
    $ctlrCinema->accueil();
}  

?>