<?php 


namespace Controller;
use Model\Connect;

class CinemaController {

    public function accueil() {
        require "view/accueil.php";
    }

    public function listFilm() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT * FROM film");
                
                
        require "view/listeFilm.php";
    }

    public function listActeur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT personne.nom AS nom, personne.prenom AS prenom FROM acteur INNER JOIN personne ON acteur.id_personne = personne.id_personne");
                
                
        require "view/listActeur.php";
    }
}                