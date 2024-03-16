<?php

use Controller\CinemaController; 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});    
    
$ctlrCinema = new CinemaController();    

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {

        case "listFilm": $ctlrFilm->listFilm(); break;
        case "listActeur": $ctlrPersonne->listActeur(); break; 
    }
}        

?>