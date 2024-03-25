<?php 


namespace Controller;
use Model\Connect;

class PersonneController {

    public function accueil() {
        require "view/accueil.php";
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

    //Detail Acteur

    public function detailActeur($id) {
        $pdo = Connect::seConnecter(); 

        $requete = $pdo->prepare
        ("SELECT 
        CONCAT(personne.prenom, ' ',personne.nom) AS nomActeur,
        sexe,
        date_naissance 
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE acteur.id_acteur = :id
        ");
        
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare
        ("SELECT 
        nom_role,
        titre_film,
        annee_de_sortie
        FROM casting
        INNER JOIN film ON casting.id_film = film.id_film
        INNER JOIN rolefilm ON casting.id_role = rolefilm.id_role
        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne
        WHERE casting.id_acteur = :id
        ORDER BY annee_de_sortie DESC              
        ");

        $requete2->execute(["id"=> $id]);

        require "view/personne/detailPersonne.php";
    }

}