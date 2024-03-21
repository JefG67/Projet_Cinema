<?php 


namespace Controller;
use Model\Connect;

class GenreController {

    public function accueil() {
        require "view/accueil.php";
    }


    public function supprimerGenre($id){
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare
        ("DELETE 
          FROM genre_film
          WHERE id_genre_film = :id;
        ");
        $requete->execute(["id" => $id]);
   
    }     
}