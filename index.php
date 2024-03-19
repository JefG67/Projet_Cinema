<?php
session_start();

use Controller\CinemaController; 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});    
    
$ctlrCinema = new CinemaController();    

if (isset($_GET["action"])) {
    $id = (isset($_GET["id"])) ? $_GET["id"] : null;
    switch ($_GET["action"]) {

        case "listFilm": $ctlrCinema->listFilm(); break;
        case "listActeur": $ctlrCinema->listActeur(); break;
        case "listRealisateur": $ctlrCinema->listRealisateur(); break;
        case "listGenre": $ctlrCinema->listGenre(); break;
        case "listRole": $ctlrCinema->listRole(); break;
        case "detailFilm": $ctlrCinema->detailFilm($id); break;
    }
} else {
    $ctlrCinema->accueil();
}  

?>