<?php 


namespace Controller;
use Model\Connect;

class CinemaController {

    public function accueil() {
        require "view/accueil.php";
    }

    public function listFilm() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT * 
        FROM film");
                
                
        require "view/film/listFilm.php";
    }

    //liste d'acteur nom/prenom
    public function listActeur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM acteur 
        INNER JOIN personne ON acteur.id_personne = personne.id_personne");
                
                
        require "view/listActeur.php";
    }

    //liste des realisateurs nom/prenom
    public function listRealisateur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM realisateur 
        INNER JOIN personne ON realisateur.id_personne = personne.id_personne");
                
                
        require "view/listRealisateur.php";
    }
    
    //list des genres 

    public function listGenre() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            libelle
        FROM genre_film
        
        ");
        require "view/listGenre.php";
        
    }
    //list des roles 
    public function listRole() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            nom_role
        FROM rolefilm
        
        ");
        require "view/listrole.php";
        
    }
    //affiche le détail d'un unique film 
    public function detailFilm(int $id) {
       
       
        $pdo = Connect::seConnecter();
        //j'affiche un element via son ID
        $requete = $pdo->prepare
        ("SELECT
            film.titre_film,
            film.annee_de_sortie,
            film.note_film,
            film.synopsis_film,
        TIME_FORMAT(SEC_TO_TIME(film.duree_film * 60), '%Hh%imin') AS dure_film
        FROM film
        WHERE film.id_film = :id;
        ");
      
        $requete->execute(["id" => $id]);
        
        
        //affiche acteurs + roles
        $requete2 = $pdo->prepare
        ("SELECT 
            rolefilm.nom_role AS nomRoleFilm,
	        CONCAT(personne.prenom, ' ',personne.nom) AS nActeur
	    
	    FROM casting
        INNER JOIN film ON casting.id_film = film.id_film
        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne
        INNER JOIN rolefilm ON casting.id_role = rolefilm.id_role
        
	    WHERE film.id_film = :id;
        ");
        
        $requete2->execute(["id" => $id]);
        
        //afficher le genre
        $requete3 = $pdo->prepare
        ("SELECT
            genre_film.libelle AS genre                  
        FROM genre_film
        INNER JOIN categorie ON categorie.id_genre_film = genre_film.id_genre_film
        INNER JOIN film ON film.id_film = categorie.id_film
        WHERE film.id_film = :id;
        ");

        $requete3->execute(["id" => $id]);

        require "view/film/detailFilm.php";
	
    }   
}       





