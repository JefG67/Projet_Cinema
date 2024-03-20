<?php
session_start();

use Controller\CinemaController;
use Controller\FilmController; 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});    
    
$ctlrCinema = new CinemaController();
  

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {

        case "listFilm": $ctlrCinema->listFilm(); break;
        case "listActeur": $ctlrCinema->listActeur(); break;
        case "listRealisateur": $ctlrCinema->listRealisateur(); break;
        case "listGenre": $ctlrCinema->listGenre(); break;
        case "listRole": $ctlrCinema->listRole(); break;
        case "detailFilm": $ctlrCinema->detailFilm($id); break;
        

        // case "ajoutGenre" :$ctlrCinema->ajoutGenre(); break;
        case "supprimerGenre" : $ctlrCinema->supprimerGenre($id); break;
        // case "addFilm": $ctlrCinema->ajoutFilm(); break;
    }
} else {
    $ctlrCinema->accueil();
}  

?>