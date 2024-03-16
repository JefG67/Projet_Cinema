<?php 


namespace Controller;
use Model\Connect;

class CinemaController {

    public function afficheTitreFilm() {
        $pdo = Connect::seConnecter();

        // Requete pour l'affichage des films 
        $requete = $pdo->query("
                SELECT 
                    film.titre_film, 
                    film.annee_de_sortie,
                FROM film
                ");
                
                require "view/afficheTitreFilm.php";
    }
}                