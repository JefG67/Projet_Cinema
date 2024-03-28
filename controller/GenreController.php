<?php 


namespace Controller;
use Model\Connect;

class GenreController {

    public function accueil() {
        require "view/accueil.php";
    }



        //list des genres 

     public function listGenre() {

        $pdo = Connect::seConnecter();
    
        $requete = $pdo->query
        ("SELECT 
            libelle
        FROM genre_film
            
        ");
        require "view/genre/listGenre.php";
            
        }

        //supprimer un genre
    public function supprimerGenre($id){
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare
        ("DELETE 
          FROM genre_film
          WHERE id_genre_film = :id;
        ");
        $requete->execute(["id" => $id]);
   
    }     
    //detail genre
    public function detailGenre($id){
        $pdo = Connect::seConnecter();

        
        $requete = $pdo->prepare
        ("SELECT
            film.id_film AS idFilm,
            film.titre_film,
            film.affiche_film,
            genre_film.libelle,
            film.annee_de_sortie AS dateDeSortie
        FROM film
        INNER JOIN categorie ON film.id_film = categorie.id_film
        INNER JOIN genre_film ON categorie.id_genre_film = genre_film.id_genre_film
        WHERE genre_film.id_genre_film = :id;
        ");
        $requete->execute(["id" => $id]);

        require "view/genre/detailGenre.php";

        
    }
    //ajout Genre
    public function ajoutGenre(){

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("
            INSERT INTO genre (id_genre) VALUE (:id_genre)
        ");

        $requete->execute(["id_genre"=>$id_genre]);

        require "view/ajouts/ajoutGenre.php";
    }
        
        

}




