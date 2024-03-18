<?php
session_start();

use Controller\CinemaController; 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});    
    
$ctlrCinema = new CinemaController();    

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {

        case "listFilm": $ctlrCinema->listFilm(); break;
        case "listActeur": $ctlrCinema->listActeur(); break;
        // case "listGenre": $ctlrCinema->listGenre(); break;
    }
} else {
    $ctlrCinema->accueil();
}  

?>