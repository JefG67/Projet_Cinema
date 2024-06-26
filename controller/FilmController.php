<?php


namespace Controller;

use Model\Connect;

class FilmController
{

    public function accueil()
    {
        require "view/accueil.php";
    }


    public function listFilm()
    {



        //list des films
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT * 
        FROM film");


        require "view/film/listFilm.php";
    }



    //Sup un film
    public function supprimerFilm($id)
    {


        $pdo = Connect::seConnecter();


        $requete = $pdo->prepare("  DELETE 
            FROM film 
            WHERE id_film = :id;
        ");

        $requete->execute(["id" => $id]);

        header("Location:index.php?action=listFilm");
        die;
    }

    //affiche le détail d'un unique film 
    public function detailFilm(int $id)
    {


        $pdo = Connect::seConnecter();
        //j'affiche un element via son ID
        $requete = $pdo->prepare("SELECT
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
        $requete2 = $pdo->prepare("SELECT 
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
        $requete3 = $pdo->prepare("SELECT
            genre_film.libelle AS genre                  
        FROM genre_film
        INNER JOIN categorie ON categorie.id_genre_film = genre_film.id_genre_film
        INNER JOIN film ON film.id_film = categorie.id_film
        WHERE film.id_film = :id;
        ");

        $requete3->execute(["id" => $id]);

        require "view/film/detailFilm.php";
    }

    //ajout Film
    public function ajoutFilm(){
        if(isset($_POST['submit'])){
            $titreFilm = filter_input(INPUT_POST, "titreFilme",FILTER_SANITIZE_SPECIAL_CHARS);
            $dateSortieFilm = filter_input(INPUT_POST, "dateSortieFilm",FILTER_SANITIZE_SPECIAL_CHARS);
            $dureeFilm = filter_input(INPUT_POST, "dureeFilm",FILTER_SANITIZE_SPECIAL_CHARS);
            $noteFilm = filter_input(INPUT_POST, "noteFilm",FILTER_SANITIZE_SPECIAL_CHARS);
            $synopsisFilm = filter_input(INPUT_POST, "synopsisFilm",FILTER_SANITIZE_SPECIAL_CHARS);
            $afficheFilm = filter_input(INPUT_POST, "afficheFilm",FILTER_SANITIZE_URL);

            $pdo = Connect::seConnecter();

            $requete = $pdo->prepare
            ("INSERT INTO film ( titre_film, annee_de_sortie, duree_film, note_film, synopsis_film, affiche_film)
            VALUES ( :titre_film, :annee_de_sortie, :duree_film, :note_film, :synopsis_film, :affiche_film)
            ");

            $requete->execute([
                "titre"=>$titreFilm,
                "date_sortie"=>$dateSortieFilm,
                "duree"=>$dureeFilm,
                "note"=>$noteFilm,
                "synopsis"=>$synopsisFilm,
                "affiche"=>$afficheFilm,
                
            ]); 


        }



    }
}
