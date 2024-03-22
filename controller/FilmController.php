<?php 


namespace Controller;
use Model\Connect;

class FilmController {

    public function accueil() {
        require "view/accueil.php";
    }


    public function listFilm() {



        //list des films
        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT * 
        FROM film");
                
                
        require "view/film/listFilm.php";
    }



    //Sup un film
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