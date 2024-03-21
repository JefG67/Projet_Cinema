<?php 


namespace Controller;
use Model\Connect;

class FilmController {

    public function accueil() {
        require "view/accueil.php";
    }


    public function supprimerFilm($id){
            
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare
        ("  DELETE 
            FROM film 
            WHERE id_film = :id;
        ");

        $requete->execute(["id" => $id]);

      

        
    }


}