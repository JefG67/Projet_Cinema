<?php 


namespace Controller;
use Model\Connect;

class CinemaController {

    public function accueil() {
        require "view/accueil.php";
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
            film.affiche_film,
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

//     //ajout d'un film
//     public function ajoutFilm() {

//         if(isset($_POST['submit'])){
//             //je crée des filtres pour les données du formulaire
//             $filmTitre = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
//             $filmNote = filter_input(INPUT_POST, "film_note",FILTER_SANITIZE_SPECIAL_CHARS);
//             $filmDuree = filter_input(INPUT_POST, "film_duree",FILTER_SANITIZE_SPECIAL_CHARS);
//             $filmSynopsis = filter_input(INPUT_POST, "film_synopsis", FILTER_SANITIZE_SPECIAL_CHARS);

//         $pdo = Connect::seConnecter();
//         $requete = $pdo->prepare
//         ("
//         INSERT INTO film (titre_film, annee_de_sortie, duree_film, note_film, synopsis_film)
//         VALUES (:titre_film, :annee_de_sortie, :duree_film, :note_film, :synopsis_film)
//         ");
//         $requete->execute([]);
//     }




}



