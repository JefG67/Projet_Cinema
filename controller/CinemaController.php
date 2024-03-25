<?php 


namespace Controller;
use Model\Connect;

class CinemaController {

    public function accueil() {
        require "view/accueil.php";
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



